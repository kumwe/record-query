# Public API

Constructor invariants, serialization, exceptions and method contracts follow. Values perform no I/O; host inputs must remain stable through each operation.

## Kumwe\Record\Query\QueryValue

/**
 * The closed set of literal types a business-record query is allowed to bind.
 *
 * Comparison values, set members and cursor sort values are all checked here as their node is built, so
 * the restriction holds across a whole query tree instead of being rediscovered by the compiler.
 * Floats are refused so a stored exact value is never matched against an approximation, strings are
 * capped so a filter cannot push an unbounded payload into a prepared statement, and arrays are refused
 * because a collection is expressed as a set filter whose members are each checked individually. Null
 * is accepted here, since a cursor sort value can legitimately read null; `ComparisonFilter` rejects it
 * separately, because asking whether a field equals null is `NullFilter`'s job.
 *
 * @since  0.2.0
 */

### assert

/**
     * Require a literal to be one of the bounded types a query may bind.
     *
     * @param   mixed  $value  Candidate literal from a comparison, a set member, or a cursor sort value.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the value is a string longer than 4096 bytes, or is a
     *          float, an array, or any other runtime type outside null, bool, int, string and the date,
     *          decimal, money, quantity and zoned date-time value objects.
     *
     * @since   0.2.0
     */

### canonical

/**
     * Reduce one admitted literal to its stable JSON representation.
     *
     * @param   mixed  $value  Query literal to canonicalize.
     *
     * @return  mixed  Canonical scalar or array representation.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RecordCursor

/**
 * Opaque browse token as it crosses the process boundary, bounded and shape-checked at the edge.
 *
 * A page cursor travels out to a client and comes back on the next request, so the string is untrusted
 * on arrival. This type owns only what can be decided without the signing key: that the token is two
 * base64url segments joined by a single dot and stays inside a size a request may reasonably spend
 * hashing. That is what lets `RecordCursorCodec` split it without guarding for a missing half, and what
 * keeps an unbounded string from reaching the HMAC at all. Everything the token means — its signature
 * and the `CursorPosition` inside — belongs to the codec, so holding one of these says nothing about
 * whether it was minted here.
 *
 * @since  0.2.0
 */

### fromString

/**
     * Accept a token from the outside world once its shape and size are known to be safe.
     *
     * @param   string  $token  Cursor exactly as the caller sent it back, before any signature check.
     *
     * @return  self  The token wrapped so the codec can verify it.
     *
     * @throws  InvalidArgumentException  When the token is under 32 bytes or over 65536, or is not two
     *          non-empty base64url segments separated by a single dot.
     *
     * @since   0.2.0
     */

### value

/**
     * Read the raw token back out, for signature verification or for writing into a response.
     *
     * @return  string  The token in `payload.signature` form, byte for byte as it was accepted.
     *
     * @since   0.2.0
     */

### __toString

/**
     * Render the cursor wherever a string is expected, such as a query parameter or a JSON body.
     *
     * @return  string  The same token `value()` returns.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RecordProjection

/**
 * Choice of what a browse page carries back: field values, hydrated relations, and aggregates.
 *
 * A stored record is usually wider than the caller needs, so the projection is how a caller names the
 * part it wants and nothing else. Empty `fields` means every field the definition exposes to readers,
 * which is the common case; naming fields narrows both the columns the compiler selects and the view
 * the caller receives, and the compiler adds back any field a requested formula depends on. `includes`
 * are resolved once for the whole page rather than per row, and `aggregates` run over every matching
 * record rather than over the page, so neither cost grows with the page size. The three counts are
 * capped here, at construction, because they are what decide how much work one page of a browse does.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Capture and bound what a browse page should carry back.
     *
     * Field and include handles are checked as query identifiers and deduplicated here; whether the
     * definition actually declares them, and whether the caller may read them, is settled later by the
     * compiler against the pinned definition.
     *
     * @param   list<string>           $fields      Field handles to disclose, or empty for every readable field.
     * @param   list<string>           $includes    Relationship handles to hydrate alongside the page.
     * @param   array<array-key, mixed>  $aggregates  Aggregates to compute over the whole match.
     *
     * @throws  InvalidArgumentException  When more than 64 fields, 4 includes or 16 aggregates are
     *          asked for, a field or include handle is not a valid query identifier, or two aggregates
     *          claim the same alias.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Reduce the projection to the canonical array the query digest hashes.
     *
     * @return  array{fields: list<string>, includes: list<string>, aggregates: list<array<string, mixed>>}
     *          The three requested lists, with each aggregate already flattened to its own array form.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\NullFilter

/**
 * Leaf of a business-record filter tree that tests whether a field holds a value at all.
 *
 * This is deliberately a node of its own rather than a comparison against null, because SQL answers no
 * equality test against null the way a caller expects — which is also why `ComparisonFilter` refuses a
 * null literal and points here. The compiler renders the node as `IS NULL`, or `IS NOT NULL`, over
 * every physical column the field occupies and joins those tests with `AND`, so a field stored across
 * several columns is empty only when every one of its columns is null, and filled only when none is.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Test one field for the presence or absence of a stored value.
     *
     * @param   string  $field   Handle of the definition field to test; the compiler further requires it
     *          to be filterable and visible to the caller.
     * @param   bool    $isNull  True to match records where the field holds no value, false to match those
     *          where it holds one.
     *
     * @throws  \InvalidArgumentException  When the field handle is not a lowercase query identifier.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Export the test in the canonical shape a query digest hashes.
     *
     * @return  array{type: string, field: string, is_null: bool}  The node tagged `null`, the field
     *          handle, and which way round the test runs.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count the predicates a compiler would emit for this node.
     *
     * @return  int  Always one, whatever the field's physical column count, since the per-column null
     *          tests of a composite field are budgeted as a single test.
     *
     * @since   0.2.0
     */

### depth

/**
     * Measure how far this node nests.
     *
     * @return  int  Always one: a null test is a leaf and carries no children.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Measure how many relation hops this node crosses.
     *
     * @return  int  Always zero: a null test reads the queried record's own field.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\BooleanOperator

/**
 * How a `BooleanFilter` combines the filters nested under it.
 *
 * Every composite predicate in a business-record query is such a group: one of these three operators
 * over between one and sixteen children. `Not` is the case that carries a constraint of its own — it
 * accepts exactly one child, which `BooleanFilter` enforces — and the compiler renders it so that a
 * child which evaluates to unknown counts as unmatched, keeping negation total over nullable columns
 * rather than silently dropping those rows.
 *
 * @since  0.2.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Record\Query\RecordQuerySpecification

/**
 * Complete, self-bounding description of one page of a business-record browse.
 *
 * Everything a caller may ask for — which records match, in what order, how many, from where, and how
 * much of each — arrives as this one object, and every bound it has to respect is enforced in its
 * constructor rather than at the database. A specification that exists is therefore already inside the
 * limits `DoctrineBusinessRecordQueryCompiler` is prepared to compile, which leaves the compiler free
 * to concentrate on resolving handles against the pinned definition and installed schema. Pagination
 * is keyset-only: `digest()` fingerprints every choice except the cursor, so that fingerprint is the
 * same for every page of one query and a page token cannot be replayed against a different query.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Assemble one page request and reject it when any of its bounds is exceeded.
     *
     * The filter tree is measured rather than inspected: its own operation count, nesting depth and
     * relation-hop depth decide admission here, so an oversized query is refused before a single handle
     * is resolved or a statement is built.
     *
     * @param   ?RecordFilter      $filter           Predicate every returned record must satisfy; null
     *          matches every record in scope.
     * @param   ?RecordSearch      $search           Free-text search required in addition to the
     *          filter; null searches nothing.
     * @param   array<array-key, mixed>   $sorts            Ordering keys in priority order; empty orders by
     *          last update, newest first.
     * @param   ?RecordCursor      $after            Signed keyset cursor from the previous page; null
     *          starts at the first page.
     * @param   int                $pageSize         Most records one page returns, from 1 to 200.
     * @param   ?RecordProjection  $projection       What each record carries back; null takes every
     *          readable field with no includes or aggregates.
     * @param   bool               $includeArchived  True to also match archived records.
     * @param   bool               $includeDeleted   True to also match soft-deleted records.
     *
     * @throws  InvalidArgumentException  When the page size falls outside 1 to 200, more than five
     *          sorts are given, two sorts name the same field, or the filter nests deeper than 8,
     *          crosses more than 2 relationships, or holds more than 64 operations.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Reduce every choice the specification makes to a canonical array.
     *
     * @param   bool  $includeCursor  False omits the cursor, which is what keeps the encoded form
     *          identical from one page of a query to the next.
     *
     * @return  array<string, mixed>  One snake-cased key per query choice; `filter` and `search` are
     *          null when unset, and `after` when unset or excluded.
     *
     * @since   0.2.0
     */

### digest

/**
     * Fingerprint every choice this query makes except which page of it is being read.
     *
     * The cursor is left out deliberately: the value identifies the query, not a position inside it, so
     * it holds still across that query's pages. `DoctrineBusinessRecordQueryCompiler` hashes the same
     * canonical form into the digest it stamps on a cursor, together with the definition version and
     * scope the page was read under, and refuses a cursor whose digest does not match.
     *
     * @return  string  Lowercase 64-character SHA-256 over the canonical form of the specification.
     *
     * @throws  \InvalidArgumentException  When a value the query
     *          carries cannot be canonically encoded, a string that is not valid UTF-8 being the case
     *          the query's own bounds still admit.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\BusinessRecordSort

/** One typed business-record sort key. @since 0.2.0 */

### field

/** @since 0.2.0 */

### toArray

/** @return array<string, mixed> @since 0.2.0 */

## Kumwe\Record\Query\TextFilter

/**
 * Leaf of a business-record filter tree that matches one named textual field against a substring.
 *
 * Reach for this when the caller knows which field to look in and how the text should anchor; a term to
 * be looked for across several fields at once is `RecordSearch` instead. The match is deliberately
 * narrow: the compiler renders it as `LOWER(column) LIKE ? ESCAPE '!'` over a single string, text or
 * ascii-string column, having escaped `!`, `%` and `_` in the caller's text first. Matching is therefore
 * case-insensitive, the operator alone decides where the wildcards sit, and a caller cannot widen a
 * lookup into a wildcard sweep by putting metacharacters in the search text.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Match one field against a substring, proving the field handle and bounding the text first.
     *
     * @param   string        $field     Handle of the definition field to test; the compiler further requires
     *          it to be filterable, visible to the caller, and stored in exactly one textual column.
     * @param   TextOperator  $operator  Where in the stored value the text has to sit.
     * @param   string        $text      Text to look for, 1 to 512 characters, matched case-insensitively and
     *          taken literally: its `LIKE` metacharacters are escaped before binding.
     *
     * @throws  InvalidArgumentException  When the field handle is not a lowercase query identifier, or the
     *          text is empty or longer than 512 characters.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Export the match in the canonical shape a query digest hashes.
     *
     * The text is carried through exactly as the caller wrote it, case included, so two queries differing
     * only in the casing of their search text fingerprint differently even though they match the same rows.
     *
     * @return  array{type: string, field: string, operator: string, text: string}  The node tagged `text`,
     *          the field handle, the operator's backing value, and the unescaped search text.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count the predicates a compiler would emit for this node.
     *
     * @return  int  Always one: the match becomes a single `LIKE` comparison.
     *
     * @since   0.2.0
     */

### depth

/**
     * Measure how far this node nests.
     *
     * @return  int  Always one: a text match is a leaf and carries no children.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Measure how many relation hops this node crosses.
     *
     * @return  int  Always zero: a text match reads the queried record's own field.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\ComparisonOperator

/**
 * Test a `ComparisonFilter` applies between one field and one literal value.
 *
 * The set stops at the six tests the query compiler can render with the same meaning on every
 * supported engine; anything richer is expressed with the dedicated text, set, null or relation
 * filters instead. `Equal` and `NotEqual` are the only cases accepted against a composite field —
 * one the definition spreads over several physical columns — because ordering such a field has no
 * single meaning; the other four also insist on a column the engines order identically, which rules
 * out boolean and identifier columns that only compare for equality.
 *
 * @since  0.2.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Record\Query\AggregateFunction

/**
 * Summary a report query computes over the business records a filter selects.
 *
 * `RecordAggregate` pairs one of these with an output alias and, for every case but `Count`, a field
 * handle; the query compiler renders the case as the SQL function of the same name over that field's
 * single physical column. The set is closed on purpose, and each case is further restricted to columns
 * that answer it the same way everywhere: `Sum` and `Average` are refused over anything but an exact
 * numeric column, and `Minimum` and `Maximum` over a column the supported engines do not order
 * identically.
 *
 * @since  0.2.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Record\Query\QueryIdentifier

/**
 * The grammar every caller-supplied name in a business-record query has to satisfy.
 *
 * Filter fields, sort fields, projection entries and relationship names all arrive from outside, and
 * the compiler resolves each to a physical name it concatenates into SQL. Applying the grammar in each
 * query node's constructor means a name carrying a quote, a wildcard, whitespace or upper case is
 * refused where it is introduced, so a whole filter tree is valid by construction and no later pass has
 * to be trusted to sweep it.
 *
 * @since  0.2.0
 */

### assertField

/**
     * Require a caller-supplied name to be a well-formed query identifier.
     *
     * @param   string  $value  Candidate name: a filter or sort field, a projection entry, or the
     *          relationship a relation filter traverses.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the value is not one to 63 characters of lowercase letters,
     *          digits and underscores beginning with a letter.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RelationQuantifier

/**
 * How many of a record's related records must satisfy the filter nested inside a `RelationFilter`.
 *
 * These three cases are the whole vocabulary a relation hop offers, and each compiles to a different
 * shape around the same correlated `EXISTS`: an existence test, its negation, or the negation of a
 * search for a related record that fails the nested filter. That last form spells failure with a
 * `CASE` expression instead of SQL `NOT`, so a comparison that is unknown for a related record counts
 * against `All` rather than being quietly ignored.
 *
 * @since  0.2.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Record\Query\SetFilter

/**
 * Leaf of a business-record filter tree that tests one field against a bounded set of literal values.
 *
 * This is how a browse says "any of these" without paying for an OR group per member: the whole set
 * compiles to a single `IN` list and costs one operation against the query's budget. Every member is
 * checked as the node is built, against the same closed set of bounded types a comparison may bind and
 * never null, since absence is `NullFilter`'s job; the list is capped at a hundred so a caller cannot
 * push an unbounded `IN` into a prepared statement. A negated set is spelled with a `CASE` expression
 * rather than SQL `NOT IN`, so a record whose column is null counts as being outside the set instead of
 * silently dropping out of the result.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Test one field for membership of a set, proving the field handle and every member first.
     *
     * @param   string                 $field    Handle of the definition field to test; the compiler further
     *          requires it to be filterable, visible to the caller, and stored in a single column the engines
     *          all compare for equality.
     * @param   array<array-key, mixed>  $values   Members to match against: 1 to 100 bools, ints, strings of at
     *          most 4096 bytes, or date-time, decimal, money, quantity and zoned date-time value objects.
     *          Duplicates are kept as given.
     * @param   bool                   $negated  True to match records whose field lies outside the set, one
     *          holding no value at all included.
     *
     * @throws  InvalidArgumentException  When the field handle is not a lowercase query identifier, the set is
     *          empty or holds more than 100 members, or a member is null, a float, or of a type or size a query
     *          may not bind.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Export the membership test in the canonical shape a query digest hashes.
     *
     * Members are canonicalised on the way out but keep the order they were given in, so two callers naming
     * the same values in a different order fingerprint differently and cannot share a page cursor.
     *
     * @return  array{type: string, field: string, negated: bool, values: list<mixed>}  The node tagged `set`,
     *          the field handle, which way round the test runs, and the canonicalised members; the member
     *          list is never empty.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count the predicates a compiler would emit for this node.
     *
     * @return  int  Always one, however many members the set carries: the whole `IN` list is budgeted as a
     *          single test.
     *
     * @since   0.2.0
     */

### depth

/**
     * Measure how far this node nests.
     *
     * @return  int  Always one: a set test is a leaf and carries no children.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Measure how many relation hops this node crosses.
     *
     * @return  int  Always zero: a set test reads the queried record's own field.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\BusinessRecordSearch

/** Bounded business-record search request. @since 0.2.0 */

### toArray

/** @return array<string, mixed> @since 0.2.0 */

## Kumwe\Record\Query\QueryCanonicalizer

/**
 * Reduces a query literal to the stable form a specification digest and a cursor payload are built on.
 *
 * Every filter node canonicalises its literals as it exports itself, which is what makes a digest
 * depend on the value the query means rather than on the PHP type the caller happened to hand over: an
 * `ExactDecimal` and its decimal string, or a `DateTimeImmutable` and its ISO-8601 rendering, collapse
 * to the same text, so two callers expressing the same page get the same digest and can share a
 * cursor. The reduction itself is `RecordValueGuard`'s; this type exists so the query layer depends on
 * one narrow entry point rather than on the record domain's wider guard.
 *
 * @since  0.2.0
 */

### value

/**
     * Reduce one query literal to its canonical, JSON-encodable form.
     *
     * @param   mixed  $value  Literal held by a filter, a set member, or a cursor sort value.
     *
     * @return  mixed  What the value canonicalises to: a decimal flattens to its string, money,
     *          quantity and zoned date-time to their stored arrays, a date to an ISO-8601 string with
     *          microseconds and offset, and null, bools, ints and strings pass through untouched.
     *
     * @throws  \InvalidArgumentException  When the value, or anything nested inside an array, is a float
     *          or a runtime type a business record cannot carry.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RecordFilter

/**
 * One node of the bounded predicate tree a business-record browse is allowed to express.
 *
 * Browse accepts no SQL and no expression string: a caller assembles comparison, set, null, text,
 * boolean and relation nodes, and `RecordQuerySpecification` admits the tree only after asking it how
 * large it is. That is why every node reports its own operation count, nesting depth and relation-hop
 * depth — the bounds are settled at construction, before `DoctrineBusinessRecordQueryCompiler` resolves
 * a single handle against the pinned definition. Implementations are immutable, validate their field
 * handles and values as they are built, and name logical handles only, never a physical column.
 *
 * @since  0.2.0
 */

### toArray

/**
     * Reduce this node and everything beneath it to its canonical array form.
     *
     * The `type` key names the node kind so the tree survives encoding without its class names. This is
     * also the form `RecordQuerySpecification::digest()` hashes, so two filters differing in any operand
     * fingerprint differently and their page cursors cannot be interchanged.
     *
     * @return  array<string, mixed>  The node keyed by `type`, alongside that kind's own operands.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count the predicate operations this node contributes, its whole subtree included.
     *
     * @return  int  Number of nodes from here down, at least 1; `RecordQuerySpecification` refuses a
     *          filter of more than 64, and the compiler counts again as it walks the tree.
     *
     * @since   0.2.0
     */

### depth

/**
     * Report how deeply this node nests, counting itself as one level.
     *
     * @return  int  Longest chain of nested nodes from here down, at least 1; capped at 8 by
     *          `RecordQuerySpecification`.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Report how many relationship hops the deepest branch below this node crosses.
     *
     * Hops are counted apart from `depth()` because each one compiles to a correlated `EXISTS` against
     * another table, which costs far more than another conjunct on the queried one.
     *
     * @return  int  Relationship traversals on the longest branch, this node included; 0 for a node
     *          that stays on the queried table, and at most 2 once a specification has accepted it.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\TextOperator

/**
 * Where in a stored value a `TextFilter`'s search text has to appear.
 *
 * These three anchorings are the whole vocabulary a text filter offers, and each one decides only where
 * the compiler places the `%` wildcards around the caller's text — the text itself is escaped and
 * lowercased first, so no case has any way to widen the pattern further. There is no regular-expression
 * or word-boundary case, because the match has to mean the same thing on every supported engine.
 *
 * @since  0.2.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Record\Query\CursorPosition

/**
 * Verified page position that a signed browse cursor carries from one request to the next.
 *
 * Both directions of a cursor build this value: `DoctrineBusinessRecordReadRepository` when it mints a
 * token from the last row of the page it is returning, and `RecordCursorCodec` when it decodes a token
 * a client sent back. Construction is therefore where an untrusted payload is checked, which is why
 * nothing but a hex digest, a UUID record key, and at most the five sort values a query may sort by
 * survives it. The digest names the exact query the position belongs to;
 * `DoctrineBusinessRecordQueryCompiler` compares it against the query actually being run, so a
 * genuine cursor replayed against a different filter or sort is refused rather than quietly paging
 * over rows the original query never matched.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Build a page position, rejecting every part of it a client could have tampered with.
     *
     * @param   string       $specificationDigest  Lowercase 64-character hex checksum of the query this
     *          position belongs to, as the query compiler computes it.
     * @param   array<array-key, mixed>  $sortValues           Sort-column values of the last row on the page just
     *          returned, in sort order; at most five, each limited to the types a query may bind.
     * @param   string       $recordKey            UUID of that last row, which breaks ties between rows
     *          whose sort values are equal.
     *
     * @throws  InvalidArgumentException  When the digest is not 64 hex characters, the record key is not a
     *          UUID, more than five sort values are supplied, or a sort value is of a type or size a query
     *          may not bind.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Flatten the position into the payload `RecordCursorCodec` signs and encodes into a token.
     *
     * Sort values are canonicalised on the way out, so a value object and the scalar it flattens to
     * produce the same payload and the position survives the JSON round trip a decode performs.
     *
     * @return  array{specification: string, values: list<mixed>, record_key: string}  The query digest,
     *          the canonicalised sort values in sort order, and the tie-breaking record key.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RelationFilter

/**
 * Predicate that holds when a record's related records satisfy a filter of their own.
 *
 * This is the only way a browse reaches past the table it is querying. It compiles to a correlated
 * `EXISTS` over the related table — reached by a direct column, a junction table, an owned-line table
 * or the canonical inverse, whichever the installed schema provides — rather than to a join, so a
 * record is still returned at most once however many of its relations match. The nested filter is
 * compiled against the target definition, resolved and fenced exactly like the queried one, so its
 * handles are the target's own and only related records inside the request scope that are not
 * soft-deleted are visible to it. Each hop costs another correlated subquery, which is why hops are
 * counted apart from nesting depth and `RecordQuerySpecification` allows only two of them.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Capture one relationship traversal.
     *
     * @param   string              $relationship  Handle of the relationship to traverse, as declared
     *          on the definition being queried.
     * @param   RelationQuantifier  $quantifier    How many of the related records must satisfy the
     *          nested filter.
     * @param   RecordFilter        $target        Predicate evaluated against a related record, written
     *          in the target definition's own field handles.
     *
     * @throws  \InvalidArgumentException  When the relationship handle is not a valid query identifier.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Reduce the traversal and the filter it nests to canonical array form.
     *
     * @return  array{type: string, relationship: string, quantifier: string, target: array<string, mixed>}
     *          A `relation` node carrying the relationship handle, the quantifier's backing value, and
     *          the nested filter's own array form.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count this traversal together with every node of the filter it applies to related records.
     *
     * @return  int  One for the hop itself plus the nested filter's own operation count.
     *
     * @since   0.2.0
     */

### depth

/**
     * Report the nesting depth of this traversal, counting the hop as one level.
     *
     * @return  int  One plus the deepest nesting reached inside the nested filter.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Report how many relationship hops this branch crosses, this traversal included.
     *
     * @return  int  One plus any hops the nested filter makes; `RecordQuerySpecification` refuses a
     *          filter reporting more than two.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RecordSort

/**
 * One ordering key of a browse, together with where its empty values belong.
 *
 * Ordering decides pagination here, not just presentation: the compiler turns the sorts into a keyset
 * `ORDER BY` and seeks the next page by comparing against the last row's values, with the record
 * identity appended as the final tie-breaker. That is why null placement belongs to the sort instead
 * of being left to the engine — it compiles to an explicit rank expression, so the order is the same
 * on every platform and a cursor issued under it can reproduce it. The field must be declared sortable
 * and back exactly one column the engine can seek on portably, which the compiler enforces when it
 * resolves the handle; a composite field, or one stored as text, JSON or a blob, is refused there.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Capture one ordering key.
     *
     * @param   string         $field      Handle of the field to order by.
     * @param   SortDirection  $direction  Whether that field ascends or descends.
     * @param   bool           $nullsLast  True to rank records with no value after those that have one.
     *
     * @throws  \InvalidArgumentException  When the field handle is not a valid query identifier.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Reduce the sort to the canonical array the query digest hashes.
     *
     * @return  array{field: string, direction: string, nulls_last: bool}  The field handle, the
     *          direction's backing value, and where empty values rank.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\ComparisonFilter

/**
 * Leaf of a business-record filter tree: one field measured against one literal value.
 *
 * Everything a caller can put in this node is checked while it is built, before any compiler sees it —
 * the field handle against the query identifier grammar, and the value against the closed set of
 * bounded types a query may bind. Floats are excluded there so a stored exact value is never matched
 * against an approximation, and null is excluded because absence is `NullFilter`'s job: a comparison
 * against null is never true in SQL, whatever the caller meant by writing one.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Compare one field against one value, validating both before the node exists.
     *
     * @param   string              $field     Handle of the definition field to test; the compiler further
     *          requires it to be filterable and visible to the caller.
     * @param   ComparisonOperator  $operator  Equality or ordering test to apply.
     * @param   mixed               $value     Literal to compare against: a bool, int, string of at most
     *          4096 bytes, or a date-time, decimal, money, quantity or zoned date-time value object. Never
     *          null and never a float.
     *
     * @throws  InvalidArgumentException  When the field handle is not a lowercase query identifier, the value
     *          is null, or the value is of a type or size a query may not bind.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Export the comparison in the canonical shape a query digest hashes.
     *
     * The value is canonicalised on the way out, so a value object and the scalar it flattens to produce
     * the same fingerprint for the query that carries them.
     *
     * @return  array{type: string, field: string, operator: string, value: mixed}  The node tagged
     *          `comparison`, the operator's backing value, and the canonicalised literal.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count the predicates a compiler would emit for this node.
     *
     * @return  int  Always one, even for a composite field, whose several columns the compiler compares
     *          as a single test.
     *
     * @since   0.2.0
     */

### depth

/**
     * Measure how far this node nests.
     *
     * @return  int  Always one: a comparison is a leaf and carries no children.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Measure how many relation hops this node crosses.
     *
     * @return  int  Always zero: a comparison reads the queried record's own field.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RecordSearch

/**
 * Free-text term matched against an explicit allowlist of a definition's fields.
 *
 * Search is a caller convenience that must not become an unbounded scan, so the fields to look in are
 * named rather than discovered: the compiler emits one case-insensitive `LIKE` per named field, ORs
 * them together and ANDs the result with the rest of the query, refusing any field the definition does
 * not declare searchable or that is not stored in a single textual column. The term is length-bounded
 * and its `LIKE` metacharacters are escaped before binding, so a caller cannot widen a search into a
 * wildcard sweep of the table.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Capture and bound one search request.
     *
     * @param   string                  $term    Text to look for, matched case-insensitively anywhere
     *          inside a field's stored value.
     * @param   array<array-key, string>  $fields  Handles of the fields to look in; kept deduplicated and
     *          sorted rather than in the order given.
     *
     * @throws  InvalidArgumentException  When the term is blank once trimmed or longer than 256
     *          characters, when no field or more than 16 fields are named, or when a handle is not a
     *          valid query identifier.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Reduce the search to the canonical array the query digest hashes.
     *
     * @return  array{term: string, fields: non-empty-list<string>}  The term exactly as given, with its
     *          fields in sorted order.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\RecordAggregate

/**
 * One summary column a report query asks the database to compute over the records a filter selects.
 *
 * A projection carries a list of these, and each names the alias its result comes back under together
 * with the function and, for every function but `Count`, the field to compute it over. The constructor
 * settles the part of the pairing that needs no definition — a count takes no field, everything else
 * requires one — so an inconsistent aggregate cannot be built at all. The rest stays with
 * `DoctrineBusinessRecordQueryCompiler`, which resolves the handle and additionally demands that the
 * field be reportable, visible to the caller, and stored in a single column of a type the chosen
 * function answers exactly.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Declare one aggregate, fixing its alias and its function-to-field pairing up front.
     *
     * @param   string             $alias     Output key the computed value is returned under; unique
     *          within a projection, which `RecordProjection` enforces across the list.
     * @param   AggregateFunction  $function  Summary to compute over the matching records.
     * @param   ?string            $field     Handle of the field to compute over, or null for a count,
     *          which is measured over rows rather than over a nominated field.
     *
     * @throws  InvalidArgumentException  When the alias is not one to 63 characters of lowercase letters,
     *          digits and underscores beginning with a letter, when a field is given for a count or left
     *          out of any other function, or when the field handle is not a valid query identifier.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Export the aggregate in the canonical shape a query digest hashes.
     *
     * @return  array{alias: string, function: string, field: ?string}  The output alias, the function's
     *          backing value, and the field handle, which is null exactly for a count.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\BooleanFilter

/**
 * Branch node of a business-record filter tree: an AND, OR or NOT group over nested filters.
 *
 * This is the only filter that composes others, so it is where a query's shape is bounded. Fan-out is
 * capped at sixteen children per group and a `Not` group is held to exactly one, while the three
 * traversal methods report the cost of the whole subtree to `RecordQuerySpecification`, which refuses
 * a filter deeper than eight levels, nested through more than two relations, or worth more than
 * sixty-four operations. The children are re-indexed on construction, so a group is always a list and
 * always compiles in the order the caller assembled it.
 *
 * @since  0.2.0
 */

### __construct

/**
     * Group filters under one boolean operator, proving the group's arity first.
     *
     * @param   BooleanOperator               $operator  How the children combine: all, any, or the negation
     *          of the single child.
     * @param   array<array-key, mixed>  $children  Nested filters to combine, between one and sixteen
     *          of them, and exactly one under `Not`.
     *
     * @throws  InvalidArgumentException  When the group has no children, more than sixteen of them, or is a
     *          `Not` group with other than exactly one child.
     *
     * @since   0.2.0
     */

### toArray

/**
     * Export the group, and everything under it, in the canonical shape a query digest hashes.
     *
     * Children keep their construction order, so two queries that differ only in how their groups were
     * assembled fingerprint differently and cannot page through each other's cursors.
     *
     * @return  array{type: string, operator: string, children: list<array<string, mixed>>}  The group
     *          tagged `boolean`, its operator's backing value, and each child exported the same way.
     *
     * @since   0.2.0
     */

### operationCount

/**
     * Count the predicates a compiler would emit for this subtree.
     *
     * @return  int  This group plus the count of every filter beneath it, which a specification caps at 64.
     *
     * @since   0.2.0
     */

### depth

/**
     * Measure how far the deepest branch of this subtree nests.
     *
     * @return  int  One level for this group plus the depth of its deepest child, capped at 8 by a
     *          specification.
     *
     * @since   0.2.0
     */

### relationDepth

/**
     * Measure how many relation hops the deepest branch of this subtree crosses.
     *
     * @return  int  The largest relation depth among the children; grouping adds no hop of its own, so a
     *          subtree of plain field filters reports zero.
     *
     * @since   0.2.0
     */

## Kumwe\Record\Query\SortDirection

/**
 * Which way one `RecordSort` key orders the rows of a business-record browse.
 *
 * Direction is not only presentation here: browse pages by keyset, so the same value that is uppercased
 * into the `ORDER BY` clause also decides which way the cursor predicate seeks — an ascending key looks
 * for rows above the last one on the previous page, a descending key for rows below it. A cursor is
 * therefore only meaningful under the directions it was issued with, which is part of what the query
 * digest stamped on it pins down.
 *
 * @since  0.2.0
 */

### cases

Generated enum/runtime member.

### from

Generated enum/runtime member.

### tryFrom

Generated enum/runtime member.

## Kumwe\Record\Query\BusinessRecordCursor

/** Opaque signed keyset cursor. @since 0.2.0 */

### value

/** @since 0.2.0 */


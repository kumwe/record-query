# Integration

Consume only an independently verified immutable release; exact pins are mandatory before 1.0. App supplies already authorized values and trusted definitions. Database adapters, scope authority, policy enforcement, signing secrets, persistence and delivery remain in App. No change to historical owners happens in this Phase 1 branch.

## Candidate source verification


The canonical proof in `resources/canonical-conformance.json` compares the frozen SDK and Business Definition encoders over 13 accepted and 8 refused values, including no-float, depth32, width512 and UTF-8 boundaries. Query literals retain their narrower admission rules before reusing Record Values normalization.

Source CI installs the original Composer metadata with actual development branch
constraints and builds an isolated no-dev archive consumer. Candidate inputs are
mutable and do not establish publication readiness. No development alias is used
to satisfy a fictional stable release.

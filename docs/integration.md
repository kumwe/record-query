# Integration

Consume only an independently verified immutable release; exact pins are mandatory before 1.0. App supplies already authorized values and trusted definitions. Database adapters, scope authority, policy enforcement, signing secrets, persistence and delivery remain in App. See the [release record](release-record.md) for baseline mappings and consumer verification requirements.

## Source and archive verification


The canonical proof in `resources/canonical-conformance.json` compares the frozen SDK and Business Definition encoders over 13 accepted and 8 refused values, including no-float, depth32, width512 and UTF-8 boundaries. Query literals retain their narrower admission rules before reusing Record Values normalization.

Run `composer install` and `composer check`. Source CI installs exact published Kumwe dependencies and builds an isolated no-dev classmap-authoritative archive consumer. The complete gate includes package-owned behavior, boundary and conformance tests, static analysis, API and ownership checks, release automation fixtures and clean-consumer verification.

Exact pre-1.0 dependency pins change through reviewed update PRs. A moving `latest` coordinate would make the verified dependency closure irreproducible.

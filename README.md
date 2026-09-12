# Kumwe Record Query

[![Packagist version][version-badge]][package]
[![CI][ci-badge]][ci]
[![PHP requirement][php-badge]](composer.json)
[![License][license-badge]](LICENSE)

Closed bounded record query grammar, projections and deterministic canonicalization
under `Kumwe\Record\Query`.

## Installation

Requires 64-bit PHP 8.5 with JSON and mbstring. Pin an exact pre-1.0 release:

```sh
composer require kumwe/record-query:0.1.3
```

Composer declares exact Record Values, Business Definition and Conversion requirements.
The version badge links published packages; CI reports default-branch package checks.
Core integration and independent release verification remain consumer responsibilities.

## Usage and Core contract

```php
require 'vendor/autoload.php';

$query = new \Kumwe\Record\Query\RecordQuerySpecification();
$fingerprint = $query->digest();
```

Construct query values directly. Filter sets, cursor positions, projections and sort
collections detach caller references so admitted intent remains stable. Core supplies
authorized scope and trusted definitions, compiles queries for its database, and
applies access and field permissions before reads, counts, paging, aggregates and
exports. Cursor signing secrets, integrity/replay binding and execution remain with
Core. A valid query or digest does not authorize access.

See [public API](docs/public-api.md), [architecture](docs/architecture.md),
[integration](docs/integration.md), [test ownership](docs/test-ownership.md),
[release record](docs/release-record.md) and [standalone consumer](examples/consumer.php).
The [canonical conformance proof](resources/canonical-conformance.json) preserves
shared encoder boundaries while query literal admission remains stricter.

## Development

Requires Node.js 20+ for development schema validation:

```sh
npm ci --prefix tools/schema-validator --ignore-scripts
composer install
composer check
```

Complete Ajv2020/YAML schema and rejection checks run alongside PHP behavior,
conformance, architecture, static analysis, manifests/governance, audit, dependency
identity, release automation and a no-dev authoritative archive consumer. CI runs
PHP 8.5 on Linux. Development schema tooling is excluded from consumer archives.

Published tags remain fixed. See [releasing](docs/releasing.md) and [changelog](CHANGELOG.md).
Licensed under [Apache-2.0](LICENSE).

[version-badge]: https://img.shields.io/packagist/v/kumwe/record-query
[package]: https://packagist.org/packages/kumwe/record-query
[ci-badge]: https://img.shields.io/github/actions/workflow/status/kumwe/record-query/ci.yml?branch=main
[ci]: https://github.com/kumwe/record-query/actions/workflows/ci.yml
[php-badge]: https://img.shields.io/packagist/php-v/kumwe/record-query
[license-badge]: https://img.shields.io/packagist/l/kumwe/record-query

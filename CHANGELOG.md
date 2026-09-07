# Changelog

## 0.1.1 - 2026-09-07

- Ship consumer-readable v2 manifests and YAML handoff with package-local governance drift checks and refreshed App consumer inventory.

- Detach filter sets, cursor positions, projections and sort collections from caller references so admitted queries and disclosure intent cannot change after validation.
- Add package-owned regression tests and refresh extraction handoff, dependency and release documentation.
- Keep exact stable dependency requirements; grouped weekly update PRs re-run the package gate.

## 0.1.0 - 2026-09-07

- Use published Business Definition 0.1.0 and Record Values 0.1.0 with stable Composer resolution.

### Added

- Closed bounded business record query grammar, projections and deterministic canonicalization.
- NRM-2026-031: package extraction enabling the Version 2 migration. Roadmap impact: enables; no completion claim.

Normal publication verifies exact stable dependency tag, source and dist identity.
Independent attestations remain optional separate verification evidence.

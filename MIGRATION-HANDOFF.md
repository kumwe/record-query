# Migration handoff

This candidate contains runtime implementation and package-owned tests. Publication and App adoption remain separate, attested tasks.

```yaml
{
  "schema": "kumwe-migration-handoff/v2",
  "artifact_kind": "framework_php",
  "migration_id": "KUMWE-MIG-2026-031",
  "change_set": "KUMWE-CS-2026-031",
  "state": "draft_pr_open",
  "source": {
    "app": {
      "repository": "https://github.com/kumwe/app",
      "baseline_commit": "24ecf956423c18933e824b43cea1bfb9127a79a9",
      "examined_paths": [
        "src/Spi/BusinessRecord/Query/AggregateFunction.php",
        "src/Spi/BusinessRecord/Query/BooleanFilter.php",
        "src/Spi/BusinessRecord/Query/BooleanOperator.php",
        "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php",
        "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php",
        "src/Spi/BusinessRecord/Query/BusinessRecordSort.php",
        "src/Spi/BusinessRecord/Query/ComparisonFilter.php",
        "src/Spi/BusinessRecord/Query/ComparisonOperator.php",
        "src/Spi/BusinessRecord/Query/CursorPosition.php",
        "src/Spi/BusinessRecord/Query/NullFilter.php",
        "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php",
        "src/Spi/BusinessRecord/Query/QueryGraphGuard.php",
        "src/Spi/BusinessRecord/Query/QueryIdentifier.php",
        "src/Spi/BusinessRecord/Query/QueryValue.php",
        "src/Spi/BusinessRecord/Query/RecordAggregate.php",
        "src/Spi/BusinessRecord/Query/RecordCursor.php",
        "src/Spi/BusinessRecord/Query/RecordFilter.php",
        "src/Spi/BusinessRecord/Query/RecordProjection.php",
        "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php",
        "src/Spi/BusinessRecord/Query/RecordSearch.php",
        "src/Spi/BusinessRecord/Query/RecordSort.php",
        "src/Spi/BusinessRecord/Query/RelationFilter.php",
        "src/Spi/BusinessRecord/Query/RelationQuantifier.php",
        "src/Spi/BusinessRecord/Query/SetFilter.php",
        "src/Spi/BusinessRecord/Query/SortDirection.php",
        "src/Spi/BusinessRecord/Query/TextFilter.php",
        "src/Spi/BusinessRecord/Query/TextOperator.php"
      ],
      "old_namespace_roots": [
        "Kumwe\\App\\BusinessRecord",
        "Kumwe\\App\\BusinessSchema",
        "Kumwe\\App\\BusinessReporting"
      ],
      "capability_index_sha256": null
    },
    "semantic_inputs": [
      {
        "owner": "kumwe/extension-sdk",
        "version_or_commit": "e8ec23f155c5836c6bd083f154a8efb6e50aec66",
        "manifest_or_corpus": "resources/extraction/v1.json",
        "sha256": "d8d9d10be869b3faeb7ef6c776c9ef26487126085c1f882886c82c292947c175"
      }
    ],
    "examined_dependencies": [
      {
        "package": "kumwe/record-values",
        "constraint": "dev-agent/extraction-v2-business-data",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/business-definition",
        "constraint": "dev-agent/candidate-sequence-dependency-v2",
        "independently_verified": false,
        "attestation": null
      },
      {
        "package": "kumwe/conversion",
        "constraint": "0.1.0",
        "independently_verified": false,
        "attestation": null
      }
    ],
    "active_related_pull_requests": [
      "https://github.com/kumwe/record-values/pull/1",
      "https://github.com/kumwe/business-schema/pull/1",
      "https://github.com/kumwe/record-model/pull/1",
      "https://github.com/kumwe/reporting/pull/1"
    ]
  },
  "target": {
    "repository": "https://github.com/kumwe/record-query",
    "artifact_identity": "kumwe/record-query",
    "canonical_namespace_or_abi": "Kumwe\\Record\\Query\\",
    "branch": "agent/extraction-v2-business-data",
    "pull_request": "https://github.com/kumwe/record-query/pull/1"
  },
  "ownership": {
    "responsibility": "Closed bounded business record query grammar, projections and deterministic canonicalization.",
    "non_responsibilities": [
      "authorization",
      "trusted generation selection",
      "persistence",
      "SQL execution",
      "transactions",
      "delivery",
      "native execution"
    ],
    "allowed_dependency_ceiling": [
      "php",
      "php-64bit",
      "ext-json",
      "kumwe/record-values",
      "kumwe/business-definition",
      "kumwe/conversion",
      "ext-mbstring"
    ],
    "implementation_owner": "kumwe/record-query",
    "next_consumer": "kumwe/app",
    "public_manifests": [
      {
        "path": "resources/public-api/v1.json",
        "sha256": "2847338def9571803f4b0e1c2271e0ba290299d61d608a0137493547b97218e0"
      },
      {
        "path": "resources/capabilities/v1.json",
        "sha256": "f3884766a22c1ee8397fd2ed2638e89c6caed52437b137bac4f5c88895e52c83"
      },
      {
        "path": "resources/service-map/v1.json",
        "sha256": "80fe313827de53fb76557e16c93d9c6044e4f6d4712fb1e1a6a56d0307c9087f"
      },
      {
        "path": "resources/test-ownership/v1.json",
        "sha256": "131af5ce9b1a0a203ada1b604c68a454dfd1f9d3102db5daf152151859205582"
      }
    ],
    "intentionally_excluded": [
      "App repositories, policy gates and lifecycle orchestration",
      "production PHP native executor fallback"
    ]
  },
  "framework_php": {
    "composer_package": "kumwe/record-query",
    "canonical_namespace": "Kumwe\\Record\\Query\\",
    "public_api_manifest": "resources/public-api/v1.json",
    "capability_manifest": "resources/capabilities/v1.json",
    "service_map": "resources/service-map/v1.json",
    "extracted_symbols": [
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/AggregateFunction.php",
        "target_path": "src/AggregateFunction.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BooleanFilter.php",
        "target_path": "src/BooleanFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BooleanOperator.php",
        "target_path": "src/BooleanOperator.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php",
        "target_path": "src/BusinessRecordCursor.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php",
        "target_path": "src/BusinessRecordSearch.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BusinessRecordSort.php",
        "target_path": "src/BusinessRecordSort.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/ComparisonFilter.php",
        "target_path": "src/ComparisonFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/ComparisonOperator.php",
        "target_path": "src/ComparisonOperator.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/CursorPosition.php",
        "target_path": "src/CursorPosition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/NullFilter.php",
        "target_path": "src/NullFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php",
        "target_path": "src/QueryCanonicalizer.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryGraphGuard.php",
        "target_path": "src/QueryGraphGuard.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryIdentifier.php",
        "target_path": "src/QueryIdentifier.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryValue.php",
        "target_path": "src/QueryValue.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordAggregate.php",
        "target_path": "src/RecordAggregate.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordCursor.php",
        "target_path": "src/RecordCursor.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordFilter.php",
        "target_path": "src/RecordFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordProjection.php",
        "target_path": "src/RecordProjection.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php",
        "target_path": "src/RecordQuerySpecification.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordSearch.php",
        "target_path": "src/RecordSearch.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordSort.php",
        "target_path": "src/RecordSort.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RelationFilter.php",
        "target_path": "src/RelationFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RelationQuantifier.php",
        "target_path": "src/RelationQuantifier.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/SetFilter.php",
        "target_path": "src/SetFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/SortDirection.php",
        "target_path": "src/SortDirection.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/TextFilter.php",
        "target_path": "src/TextFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/TextOperator.php",
        "target_path": "src/TextOperator.php"
      }
    ],
    "consumers": {
      "app_code": [
        "src/Spi/BusinessRecord/Query/AggregateFunction.php",
        "src/Spi/BusinessRecord/Query/BooleanFilter.php",
        "src/Spi/BusinessRecord/Query/BooleanOperator.php",
        "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php",
        "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php",
        "src/Spi/BusinessRecord/Query/BusinessRecordSort.php",
        "src/Spi/BusinessRecord/Query/ComparisonFilter.php",
        "src/Spi/BusinessRecord/Query/ComparisonOperator.php",
        "src/Spi/BusinessRecord/Query/CursorPosition.php",
        "src/Spi/BusinessRecord/Query/NullFilter.php",
        "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php",
        "src/Spi/BusinessRecord/Query/QueryGraphGuard.php",
        "src/Spi/BusinessRecord/Query/QueryIdentifier.php",
        "src/Spi/BusinessRecord/Query/QueryValue.php",
        "src/Spi/BusinessRecord/Query/RecordAggregate.php",
        "src/Spi/BusinessRecord/Query/RecordCursor.php",
        "src/Spi/BusinessRecord/Query/RecordFilter.php",
        "src/Spi/BusinessRecord/Query/RecordProjection.php",
        "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php",
        "src/Spi/BusinessRecord/Query/RecordSearch.php",
        "src/Spi/BusinessRecord/Query/RecordSort.php",
        "src/Spi/BusinessRecord/Query/RelationFilter.php",
        "src/Spi/BusinessRecord/Query/RelationQuantifier.php",
        "src/Spi/BusinessRecord/Query/SetFilter.php",
        "src/Spi/BusinessRecord/Query/SortDirection.php",
        "src/Spi/BusinessRecord/Query/TextFilter.php",
        "src/Spi/BusinessRecord/Query/TextOperator.php"
      ],
      "configuration_and_di": [],
      "reflection_and_string_references": [
        "Recompute using source/import closure at adoption head."
      ],
      "fixtures_and_examples": [],
      "external": [
        "kumwe/extension-sdk coordinated successor"
      ]
    },
    "dependency_injection": {
      "mode": "direct",
      "provider": null,
      "factories": [],
      "aliases": [],
      "service_lifetimes": [],
      "configuration_keys": [],
      "provider_absence_reason": "Values, contracts and stateless deterministic operations are constructed directly. Host ports are explicit inputs; no global context is captured."
    }
  },
  "native_cpp": null,
  "php_extension": null,
  "tests": {
    "moved_or_added": [
      {
        "path": "tests/Case/CanonicalSemanticsTest.php",
        "methods": [
          "testQueryDigestMatchesFrozenSdkBytes",
          "testNarrowLiteralAdmissionPrecedesCanonicalRecordReduction"
        ],
        "implementation_owner": "kumwe/record-query"
      },
      {
        "path": "tests/Case/RecordQueryBoundaryTest.php",
        "methods": [
          "testCursorBoundariesPreserveBytesWithoutClaimingAuthentication",
          "testDigestExcludesOnlyCursorAndCanonicalizesSearchFieldOrder",
          "testProjectionAndPageLimitsAreInclusiveAndDuplicatesCannotHideCost",
          "testDepthRelationAndOperationBudgetsAreOwnedByTheGrammar",
          "testForeignFilterCannotLieAboutItsComplexityOrExecuteCallbacks"
        ],
        "implementation_owner": "kumwe/record-query"
      },
      {
        "path": "tests/Case/RecordQueryGrammarTest.php",
        "methods": [
          "testQueryValuesAreBoundedTypedScalars",
          "testComparisonFilterRefusesApproximateAndNullLiterals",
          "testBooleanFilterBoundsItsFanOut",
          "testTextSetAndNullFiltersExportCanonically"
        ],
        "implementation_owner": "kumwe/record-query"
      }
    ],
    "remain_in_app_or_consumer": [
      "SQL/database matrix",
      "policy-before-query",
      "authorization and generation fences",
      "cryptographic envelope authenticity and key lifecycle",
      "transaction/concurrency and recovery",
      "export/delivery/adapters"
    ],
    "split_tests": [],
    "prohibited_duplicates": [
      "Do not retain moved implementation tests in App/SDK after the separate verified adoption."
    ],
    "corpora": [
      "resources/canonical-conformance.json"
    ]
  },
  "documentation": {
    "charter": "CHARTER.md",
    "readme": "README.md",
    "public_api": "docs/public-api.md",
    "architecture": "docs/architecture.md",
    "integration_or_consumer": "docs/integration.md",
    "examples": [
      "examples/consumer.php"
    ],
    "changelog_record": "CHANGELOG.md / Unreleased"
  },
  "release_expectations": {
    "version_policy": "SemVer; determine release version after review. Replace development dependency constraints with exact independently verified pre-1.0 releases.",
    "expected_artifact_types": [
      "Composer source zip"
    ],
    "required_checks": [
      "composer check",
      "composer security:audit",
      "composer clean-consumer",
      "review dependency ceiling",
      "immutable release and source/artifact manifests independently attested"
    ],
    "required_registry_or_installer": "Composer",
    "required_external_attestation": true
  },
  "next_task": {
    "phase_name": "Independent release verification, followed by separate App adoption",
    "permitted_only_when": [
      "Human merges package PR",
      "Immutable upstream dependency releases and target release are independently verified",
      "External RELEASE-ATTESTATION.yaml exists and matches all source/artifact identities"
    ],
    "consumer_repository": "https://github.com/kumwe/app",
    "dependency_or_native_change": "Exact-pin the reviewed immutable package release and remove the former implementation. Never use this development branch as a released dependency.",
    "namespace_or_api_replacements": [
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/AggregateFunction.php",
        "target_path": "src/AggregateFunction.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BooleanFilter.php",
        "target_path": "src/BooleanFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BooleanOperator.php",
        "target_path": "src/BooleanOperator.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php",
        "target_path": "src/BusinessRecordCursor.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php",
        "target_path": "src/BusinessRecordSearch.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/BusinessRecordSort.php",
        "target_path": "src/BusinessRecordSort.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/ComparisonFilter.php",
        "target_path": "src/ComparisonFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/ComparisonOperator.php",
        "target_path": "src/ComparisonOperator.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/CursorPosition.php",
        "target_path": "src/CursorPosition.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/NullFilter.php",
        "target_path": "src/NullFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php",
        "target_path": "src/QueryCanonicalizer.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryGraphGuard.php",
        "target_path": "src/QueryGraphGuard.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryIdentifier.php",
        "target_path": "src/QueryIdentifier.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/QueryValue.php",
        "target_path": "src/QueryValue.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordAggregate.php",
        "target_path": "src/RecordAggregate.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordCursor.php",
        "target_path": "src/RecordCursor.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordFilter.php",
        "target_path": "src/RecordFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordProjection.php",
        "target_path": "src/RecordProjection.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php",
        "target_path": "src/RecordQuerySpecification.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordSearch.php",
        "target_path": "src/RecordSearch.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RecordSort.php",
        "target_path": "src/RecordSort.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RelationFilter.php",
        "target_path": "src/RelationFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/RelationQuantifier.php",
        "target_path": "src/RelationQuantifier.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/SetFilter.php",
        "target_path": "src/SetFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/SortDirection.php",
        "target_path": "src/SortDirection.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/TextFilter.php",
        "target_path": "src/TextFilter.php"
      },
      {
        "old_owner": "extension-sdk",
        "source_path": "src/Spi/BusinessRecord/Query/TextOperator.php",
        "target_path": "src/TextOperator.php"
      }
    ],
    "files_to_update": [
      "composer.json",
      "composer.lock",
      "container configuration",
      "capability index",
      "migration ledger",
      "CHANGELOG.md"
    ],
    "files_to_remove": [
      "src/Spi/BusinessRecord/Query/AggregateFunction.php",
      "src/Spi/BusinessRecord/Query/BooleanFilter.php",
      "src/Spi/BusinessRecord/Query/BooleanOperator.php",
      "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php",
      "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php",
      "src/Spi/BusinessRecord/Query/BusinessRecordSort.php",
      "src/Spi/BusinessRecord/Query/ComparisonFilter.php",
      "src/Spi/BusinessRecord/Query/ComparisonOperator.php",
      "src/Spi/BusinessRecord/Query/CursorPosition.php",
      "src/Spi/BusinessRecord/Query/NullFilter.php",
      "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php",
      "src/Spi/BusinessRecord/Query/QueryGraphGuard.php",
      "src/Spi/BusinessRecord/Query/QueryIdentifier.php",
      "src/Spi/BusinessRecord/Query/QueryValue.php",
      "src/Spi/BusinessRecord/Query/RecordAggregate.php",
      "src/Spi/BusinessRecord/Query/RecordCursor.php",
      "src/Spi/BusinessRecord/Query/RecordFilter.php",
      "src/Spi/BusinessRecord/Query/RecordProjection.php",
      "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php",
      "src/Spi/BusinessRecord/Query/RecordSearch.php",
      "src/Spi/BusinessRecord/Query/RecordSort.php",
      "src/Spi/BusinessRecord/Query/RelationFilter.php",
      "src/Spi/BusinessRecord/Query/RelationQuantifier.php",
      "src/Spi/BusinessRecord/Query/SetFilter.php",
      "src/Spi/BusinessRecord/Query/SortDirection.php",
      "src/Spi/BusinessRecord/Query/TextFilter.php",
      "src/Spi/BusinessRecord/Query/TextOperator.php"
    ],
    "tests_to_remove": [
      "tests/Case/CanonicalSemanticsTest.php",
      "tests/Case/RecordQueryBoundaryTest.php",
      "tests/Case/RecordQueryGrammarTest.php"
    ],
    "tests_to_retain_or_add": [
      "Host responsibility cases listed above",
      "Native parity against committed semantic corpus where applicable"
    ],
    "di_or_provisioning_changes": [],
    "capability_index_changes": [
      "Record actual release and package responsibility without declaring composed roadmap completion."
    ],
    "changelog_and_evidence_changes": [
      "Record immutable artifact, attestation and remaining host acceptance gates."
    ],
    "verification_commands": [
      "composer check",
      "composer clean-consumer",
      "App affected integration train and platform matrix"
    ]
  },
  "concurrency": {
    "likely_conflict_files": [
      "App composer.json",
      "App composer.lock",
      "App capability and migration registries"
    ],
    "related_migrations": [
      "KUMWE-MIG-2026-029",
      "KUMWE-MIG-2026-030",
      "KUMWE-MIG-2026-032",
      "KUMWE-MIG-2026-033"
    ],
    "ownership_conflicts": [],
    "integration_train": "Framework 4 Business Data",
    "resolution_rule": "semantic-preservation"
  },
  "governance": {
    "roadmap_source_sha256": "a202155ef1a65f5ab293d4f8397ebf4ac430db7f1e877c776bbe7851e6fe18d8",
    "roadmap_refs": [],
    "non_roadmap_refs": [
      "NRM-2026-031"
    ],
    "completion_claim": false
  },
  "decisions": [
    "Canonical namespace and approved value behavior retained.",
    "No host authority or persistence moves into the package.",
    "See CHARTER.md for explicit dependency amendments; no release approval is inferred."
  ],
  "blockers": [
    "Immutable upstream releases and external attestations are not available for the entire dependency closure. No publication or App adoption is authorized by this candidate.",
    "Package candidate source checks do not substitute for clean immutable release verification."
  ]
}
```

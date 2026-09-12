---
schema: "kumwe-package-release-record/v1"
artifact_kind: "framework_php"
migration_id: "KUMWE-MIG-2026-031"
change_set: "KUMWE-CS-2026-031"
source:
  app:
    repository: "https://github.com/kumwe/app"
    baseline_commit: "24ecf956423c18933e824b43cea1bfb9127a79a9"
    examined_paths:
      - "examples/extensions/asset-inspection/src/Application/InspectionSummaryViewHandler.php"
      - "src/BusinessRecord/Application/BusinessRecordReadRepository.php"
      - "src/BusinessRecord/Application/Query/BrowseOwnedLineFieldChoicesQuery.php"
      - "src/BusinessRecord/Application/Query/BrowseRecordsQuery.php"
      - "src/BusinessRecord/Application/Query/BrowseRelatedRecordsQuery.php"
      - "src/BusinessRecord/Application/RecordBrowseResult.php"
      - "src/BusinessRecord/Application/RecordCursorCodec.php"
      - "src/BusinessRecord/Infrastructure/Persistence/DoctrineBusinessRecordQueryCompiler.php"
      - "src/BusinessRecord/Infrastructure/Persistence/DoctrineBusinessRecordReadRepository.php"
      - "src/BusinessReporting/Application/BusinessRecordReportReader.php"
      - "src/BusinessReporting/Application/ReportService.php"
      - "src/BusinessReporting/Infrastructure/BusinessRecordServiceReportReader.php"
      - "src/BusinessSurface/Application/BusinessRecordQueryFactory.php"
      - "src/BusinessSurface/Application/BusinessSurfaceService.php"
      - "src/Delivery/Console/Command/ManageBusinessRecordsCommand.php"
      - "src/Demo/Infrastructure/DemoBusinessProfileExporter.php"
      - "tests/Architecture/TruthfulQualityGateTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordEvolutionIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordInverseRelationshipIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordLargeDatasetIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordPolicyCompilerIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordPolicyEnforcementIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordReferenceIdentityIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordRelationshipIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordRuntimeIntegrationTest.php"
      - "tests/Integration/BusinessRecord/ImmutableRecordReversalIntegrationTest.php"
      - "tests/Integration/BusinessRecord/SdkBusinessRecordReaderIntegrationTest.php"
      - "tests/Integration/BusinessSurface/GeneratedBusinessBrowserIntegrationTest.php"
      - "tests/Integration/BusinessSurface/GeneratedBusinessQueryBudgetIntegrationTest.php"
      - "tests/Integration/BusinessSurface/GeneratedBusinessRelatedPolicyIntegrationTest.php"
      - "tests/Integration/Extension/AssetInspectionCustomViewIntegrationTest.php"
      - "tests/Integration/Performance/HotPlanRegressionIntegrationTest.php"
      - "tests/Unit/BusinessRecord/Application/BrowseOwnedLineFieldChoicesQueryTest.php"
      - "tests/Unit/BusinessRecord/Application/BrowseRelatedRecordsQueryTest.php"
      - "tests/Unit/BusinessRecord/Application/PolicyBusinessRecordReaderTest.php"
      - "tests/Unit/BusinessRecord/Application/RecordCursorCodecTest.php"
      - "tests/Unit/BusinessReporting/ExportGenerationPolicyFenceTest.php"
      - "tests/Unit/BusinessReporting/RecordExportPipelineTest.php"
      - "tests/Unit/BusinessReporting/ReportApiDiscoveryTest.php"
      - "tests/Unit/BusinessReporting/ReportBrowserErrorResponseTest.php"
      - "tests/Unit/BusinessReporting/ReportPolicyInferenceTest.php"
      - "tests/Unit/BusinessSurface/Application/BusinessRecordQueryFactoryTest.php"
      - "tests/Unit/BusinessSurface/Application/BusinessSurfaceServiceTest.php"
      - "tests/Unit/BusinessSurface/Application/Custom/CustomBusinessHandlerRegistryTest.php"
      - "tests/Unit/Governance/LayerClassifierTest.php"
      - "tools/perf-harness.php"
    old_namespace_roots:
      - "Kumwe\\App\\BusinessRecord\\"
      - "Kumwe\\App\\BusinessSchema\\"
      - "Kumwe\\App\\BusinessReporting\\"
    capability_index_sha256: null
  semantic_inputs:
    -
      owner: "kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "resources/extraction/v1.json"
      sha256: "d8d9d10be869b3faeb7ef6c776c9ef26487126085c1f882886c82c292947c175"
  examined_dependencies:
    - "kumwe/record-values 0.1.4; independent release attestation not asserted"
    - "kumwe/business-definition 0.1.2; independent release attestation not asserted"
    - "kumwe/conversion 0.1.5; independent release attestation not asserted"
target:
  repository: "https://github.com/kumwe/record-query"
  artifact_identity: "kumwe/record-query"
  canonical_namespace_or_abi: "Kumwe\\Record\\Query\\"
ownership:
  responsibility: "Closed bounded business record query grammar, projections and deterministic canonicalization."
  non_responsibilities:
    - "authorization"
    - "trusted generation selection"
    - "persistence"
    - "SQL execution"
    - "transactions"
    - "delivery"
    - "native execution"
  allowed_dependency_ceiling:
    - "php"
    - "php-64bit"
    - "ext-json"
    - "kumwe/record-values"
    - "kumwe/business-definition"
    - "kumwe/conversion"
    - "ext-mbstring"
  implementation_owner: "kumwe/record-query"
  next_consumer: "kumwe/app"
  public_manifests:
    -
      path: "resources/public-api/v1.json"
      sha256: "8757ea552ed1b1f89cbc0accb82daab1cb9ad3091f9b5b6a219473af253e60ec"
    -
      path: "resources/capabilities/v1.json"
      sha256: "d7ee277a5acbdc59fcb5588efb2d5fe62406c822e4718a179997eb61ad394620"
    -
      path: "resources/service-map/v1.json"
      sha256: "86d96e1265d9e9681fc59b94b67f1b87854323f6a65d2018d7aa2f46822eaf08"
    -
      path: "resources/test-ownership/v1.json"
      sha256: "08bdae130eb5b0e360c30cfdb8680ab1440b4c2c7abc7fef4a2b07abc12afcaf"
  intentionally_excluded:
    - "App repositories, policy gates and lifecycle orchestration"
    - "production PHP native executor fallback"
framework_php:
  composer_package: "kumwe/record-query"
  canonical_namespace: "Kumwe\\Record\\Query\\"
  public_api_manifest: "resources/public-api/v1.json"
  capability_manifest: "resources/capabilities/v1.json"
  service_map: "resources/service-map/v1.json"
  extracted_symbols:
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\AggregateFunction"
      new_fqcn: "Kumwe\\Record\\Query\\AggregateFunction"
      source_path: "src/Spi/BusinessRecord/Query/AggregateFunction.php"
      target_path: "src/AggregateFunction.php"
      kind: "enum"
      public_methods:
        - "cases"
        - "from"
        - "tryFrom"
      public_properties:
        - "name"
        - "value"
      public_constants:
        - "Count"
        - "Sum"
        - "Minimum"
        - "Maximum"
        - "Average"
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\BooleanFilter"
      new_fqcn: "Kumwe\\Record\\Query\\BooleanFilter"
      source_path: "src/Spi/BusinessRecord/Query/BooleanFilter.php"
      target_path: "src/BooleanFilter.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties:
        - "children"
        - "operator"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\BooleanOperator"
      new_fqcn: "Kumwe\\Record\\Query\\BooleanOperator"
      source_path: "src/Spi/BusinessRecord/Query/BooleanOperator.php"
      target_path: "src/BooleanOperator.php"
      kind: "enum"
      public_methods:
        - "cases"
        - "from"
        - "tryFrom"
      public_properties:
        - "name"
        - "value"
      public_constants:
        - "All"
        - "Any"
        - "Not"
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\BusinessRecordCursor"
      new_fqcn: "Kumwe\\Record\\Query\\BusinessRecordCursor"
      source_path: "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php"
      target_path: "src/BusinessRecordCursor.php"
      kind: "interface"
      public_methods:
        - "value"
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\BusinessRecordSearch"
      new_fqcn: "Kumwe\\Record\\Query\\BusinessRecordSearch"
      source_path: "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php"
      target_path: "src/BusinessRecordSearch.php"
      kind: "interface"
      public_methods:
        - "toArray"
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\BusinessRecordSort"
      new_fqcn: "Kumwe\\Record\\Query\\BusinessRecordSort"
      source_path: "src/Spi/BusinessRecord/Query/BusinessRecordSort.php"
      target_path: "src/BusinessRecordSort.php"
      kind: "interface"
      public_methods:
        - "field"
        - "toArray"
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\ComparisonFilter"
      new_fqcn: "Kumwe\\Record\\Query\\ComparisonFilter"
      source_path: "src/Spi/BusinessRecord/Query/ComparisonFilter.php"
      target_path: "src/ComparisonFilter.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties:
        - "field"
        - "operator"
        - "value"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\ComparisonOperator"
      new_fqcn: "Kumwe\\Record\\Query\\ComparisonOperator"
      source_path: "src/Spi/BusinessRecord/Query/ComparisonOperator.php"
      target_path: "src/ComparisonOperator.php"
      kind: "enum"
      public_methods:
        - "cases"
        - "from"
        - "tryFrom"
      public_properties:
        - "name"
        - "value"
      public_constants:
        - "Equal"
        - "NotEqual"
        - "LessThan"
        - "LessThanOrEqual"
        - "GreaterThan"
        - "GreaterThanOrEqual"
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\CursorPosition"
      new_fqcn: "Kumwe\\Record\\Query\\CursorPosition"
      source_path: "src/Spi/BusinessRecord/Query/CursorPosition.php"
      target_path: "src/CursorPosition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
      public_properties:
        - "sortValues"
        - "specificationDigest"
        - "recordKey"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\NullFilter"
      new_fqcn: "Kumwe\\Record\\Query\\NullFilter"
      source_path: "src/Spi/BusinessRecord/Query/NullFilter.php"
      target_path: "src/NullFilter.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties:
        - "field"
        - "isNull"
      public_constants: []
      exceptions:
        - "\\InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\QueryCanonicalizer"
      new_fqcn: "Kumwe\\Record\\Query\\QueryCanonicalizer"
      source_path: "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php"
      target_path: "src/QueryCanonicalizer.php"
      kind: "class"
      public_methods:
        - "value"
      public_properties: []
      public_constants: []
      exceptions:
        - "\\InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\QueryGraphGuard"
      new_fqcn: "Kumwe\\Record\\Query\\QueryGraphGuard"
      source_path: "src/Spi/BusinessRecord/Query/QueryGraphGuard.php"
      target_path: "src/QueryGraphGuard.php"
      kind: "class"
      public_methods:
        - "filter"
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\QueryIdentifier"
      new_fqcn: "Kumwe\\Record\\Query\\QueryIdentifier"
      source_path: "src/Spi/BusinessRecord/Query/QueryIdentifier.php"
      target_path: "src/QueryIdentifier.php"
      kind: "class"
      public_methods:
        - "assertField"
      public_properties: []
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\QueryValue"
      new_fqcn: "Kumwe\\Record\\Query\\QueryValue"
      source_path: "src/Spi/BusinessRecord/Query/QueryValue.php"
      target_path: "src/QueryValue.php"
      kind: "class"
      public_methods:
        - "assert"
        - "canonical"
      public_properties: []
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordAggregate"
      new_fqcn: "Kumwe\\Record\\Query\\RecordAggregate"
      source_path: "src/Spi/BusinessRecord/Query/RecordAggregate.php"
      target_path: "src/RecordAggregate.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
      public_properties:
        - "alias"
        - "function"
        - "field"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordCursor"
      new_fqcn: "Kumwe\\Record\\Query\\RecordCursor"
      source_path: "src/Spi/BusinessRecord/Query/RecordCursor.php"
      target_path: "src/RecordCursor.php"
      kind: "class"
      public_methods:
        - "fromString"
        - "value"
        - "__toString"
      public_properties: []
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordFilter"
      new_fqcn: "Kumwe\\Record\\Query\\RecordFilter"
      source_path: "src/Spi/BusinessRecord/Query/RecordFilter.php"
      target_path: "src/RecordFilter.php"
      kind: "interface"
      public_methods:
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties: []
      public_constants: []
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordProjection"
      new_fqcn: "Kumwe\\Record\\Query\\RecordProjection"
      source_path: "src/Spi/BusinessRecord/Query/RecordProjection.php"
      target_path: "src/RecordProjection.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
      public_properties:
        - "fields"
        - "includes"
        - "aggregates"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordQuerySpecification"
      new_fqcn: "Kumwe\\Record\\Query\\RecordQuerySpecification"
      source_path: "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php"
      target_path: "src/RecordQuerySpecification.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "digest"
      public_properties:
        - "sorts"
        - "projection"
        - "filter"
        - "search"
        - "after"
        - "pageSize"
        - "includeArchived"
        - "includeDeleted"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
        - "\\InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordSearch"
      new_fqcn: "Kumwe\\Record\\Query\\RecordSearch"
      source_path: "src/Spi/BusinessRecord/Query/RecordSearch.php"
      target_path: "src/RecordSearch.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
      public_properties:
        - "fields"
        - "term"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RecordSort"
      new_fqcn: "Kumwe\\Record\\Query\\RecordSort"
      source_path: "src/Spi/BusinessRecord/Query/RecordSort.php"
      target_path: "src/RecordSort.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
      public_properties:
        - "field"
        - "direction"
        - "nullsLast"
      public_constants: []
      exceptions:
        - "\\InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RelationFilter"
      new_fqcn: "Kumwe\\Record\\Query\\RelationFilter"
      source_path: "src/Spi/BusinessRecord/Query/RelationFilter.php"
      target_path: "src/RelationFilter.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties:
        - "relationship"
        - "quantifier"
        - "target"
      public_constants: []
      exceptions:
        - "\\InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\RelationQuantifier"
      new_fqcn: "Kumwe\\Record\\Query\\RelationQuantifier"
      source_path: "src/Spi/BusinessRecord/Query/RelationQuantifier.php"
      target_path: "src/RelationQuantifier.php"
      kind: "enum"
      public_methods:
        - "cases"
        - "from"
        - "tryFrom"
      public_properties:
        - "name"
        - "value"
      public_constants:
        - "Any"
        - "None"
        - "All"
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\SetFilter"
      new_fqcn: "Kumwe\\Record\\Query\\SetFilter"
      source_path: "src/Spi/BusinessRecord/Query/SetFilter.php"
      target_path: "src/SetFilter.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties:
        - "values"
        - "field"
        - "negated"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\SortDirection"
      new_fqcn: "Kumwe\\Record\\Query\\SortDirection"
      source_path: "src/Spi/BusinessRecord/Query/SortDirection.php"
      target_path: "src/SortDirection.php"
      kind: "enum"
      public_methods:
        - "cases"
        - "from"
        - "tryFrom"
      public_properties:
        - "name"
        - "value"
      public_constants:
        - "Ascending"
        - "Descending"
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\TextFilter"
      new_fqcn: "Kumwe\\Record\\Query\\TextFilter"
      source_path: "src/Spi/BusinessRecord/Query/TextFilter.php"
      target_path: "src/TextFilter.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "toArray"
        - "operationCount"
        - "depth"
        - "relationDepth"
      public_properties:
        - "field"
        - "operator"
        - "text"
      public_constants: []
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\BusinessRecord\\Query\\TextOperator"
      new_fqcn: "Kumwe\\Record\\Query\\TextOperator"
      source_path: "src/Spi/BusinessRecord/Query/TextOperator.php"
      target_path: "src/TextOperator.php"
      kind: "enum"
      public_methods:
        - "cases"
        - "from"
        - "tryFrom"
      public_properties:
        - "name"
        - "value"
      public_constants:
        - "Contains"
        - "StartsWith"
        - "EndsWith"
      exceptions: []
      serialization_contract: "See docs/public-api.md and package conformance corpus for exact serialization."
      compatibility: "Portable source closure; host authority stays with the consumer. See resources/extraction/v1.json for source ownership and extraction granularity."
  consumers:
    app_code:
      - "src/BusinessRecord/Application/BusinessRecordReadRepository.php"
      - "src/BusinessRecord/Application/Query/BrowseOwnedLineFieldChoicesQuery.php"
      - "src/BusinessRecord/Application/Query/BrowseRecordsQuery.php"
      - "src/BusinessRecord/Application/Query/BrowseRelatedRecordsQuery.php"
      - "src/BusinessRecord/Application/RecordBrowseResult.php"
      - "src/BusinessRecord/Application/RecordCursorCodec.php"
      - "src/BusinessRecord/Infrastructure/Persistence/DoctrineBusinessRecordQueryCompiler.php"
      - "src/BusinessRecord/Infrastructure/Persistence/DoctrineBusinessRecordReadRepository.php"
      - "src/BusinessReporting/Application/BusinessRecordReportReader.php"
      - "src/BusinessReporting/Application/ReportService.php"
      - "src/BusinessReporting/Infrastructure/BusinessRecordServiceReportReader.php"
      - "src/BusinessSurface/Application/BusinessRecordQueryFactory.php"
      - "src/BusinessSurface/Application/BusinessSurfaceService.php"
      - "src/Delivery/Console/Command/ManageBusinessRecordsCommand.php"
      - "src/Demo/Infrastructure/DemoBusinessProfileExporter.php"
      - "tools/perf-harness.php"
    configuration_and_di: []
    reflection_and_string_references: []
    fixtures_and_examples:
      - "examples/extensions/asset-inspection/src/Application/InspectionSummaryViewHandler.php"
      - "tests/Architecture/TruthfulQualityGateTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordEvolutionIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordInverseRelationshipIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordLargeDatasetIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordPolicyCompilerIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordPolicyEnforcementIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordReferenceIdentityIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordRelationshipIntegrationTest.php"
      - "tests/Integration/BusinessRecord/BusinessRecordRuntimeIntegrationTest.php"
      - "tests/Integration/BusinessRecord/ImmutableRecordReversalIntegrationTest.php"
      - "tests/Integration/BusinessRecord/SdkBusinessRecordReaderIntegrationTest.php"
      - "tests/Integration/BusinessSurface/GeneratedBusinessBrowserIntegrationTest.php"
      - "tests/Integration/BusinessSurface/GeneratedBusinessQueryBudgetIntegrationTest.php"
      - "tests/Integration/BusinessSurface/GeneratedBusinessRelatedPolicyIntegrationTest.php"
      - "tests/Integration/Extension/AssetInspectionCustomViewIntegrationTest.php"
      - "tests/Integration/Performance/HotPlanRegressionIntegrationTest.php"
      - "tests/Unit/BusinessRecord/Application/BrowseOwnedLineFieldChoicesQueryTest.php"
      - "tests/Unit/BusinessRecord/Application/BrowseRelatedRecordsQueryTest.php"
      - "tests/Unit/BusinessRecord/Application/PolicyBusinessRecordReaderTest.php"
      - "tests/Unit/BusinessRecord/Application/RecordCursorCodecTest.php"
      - "tests/Unit/BusinessReporting/ExportGenerationPolicyFenceTest.php"
      - "tests/Unit/BusinessReporting/RecordExportPipelineTest.php"
      - "tests/Unit/BusinessReporting/ReportApiDiscoveryTest.php"
      - "tests/Unit/BusinessReporting/ReportBrowserErrorResponseTest.php"
      - "tests/Unit/BusinessReporting/ReportPolicyInferenceTest.php"
      - "tests/Unit/BusinessSurface/Application/BusinessRecordQueryFactoryTest.php"
      - "tests/Unit/BusinessSurface/Application/BusinessSurfaceServiceTest.php"
      - "tests/Unit/BusinessSurface/Application/Custom/CustomBusinessHandlerRegistryTest.php"
      - "tests/Unit/Governance/LayerClassifierTest.php"
    external:
      - "kumwe/extension-sdk coordinated successor"
  dependency_injection:
    mode: "direct"
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: "Values, contracts and stateless deterministic operations are constructed directly. Host ports are explicit inputs; no global context is captured."
native_cpp: null
php_extension: null
tests:
  moved_or_added:
    - "tools/schema-validator/verify.cjs: complete canonical manifest and release-record schemas with 15 rejection fixtures"
    - "tests/Case/CanonicalSemanticsTest.php (testQueryDigestMatchesFrozenSdkBytes, testNarrowLiteralAdmissionPrecedesCanonicalRecordReduction, testQueryCollectionsCannotChangeAfterAdmission); provenance: resources/test-ownership/v1.json"
    - "tests/Case/RecordQueryBoundaryTest.php (testCursorBoundariesPreserveBytesWithoutClaimingAuthentication, testDigestExcludesOnlyCursorAndCanonicalizesSearchFieldOrder, testProjectionAndPageLimitsAreInclusiveAndDuplicatesCannotHideCost, testDepthRelationAndOperationBudgetsAreOwnedByTheGrammar, testForeignFilterCannotLieAboutItsComplexityOrExecuteCallbacks); provenance: resources/test-ownership/v1.json"
    - "tests/Case/RecordQueryGrammarTest.php (testQueryValuesAreBoundedTypedScalars, testComparisonFilterRefusesApproximateAndNullLiterals, testBooleanFilterBoundsItsFanOut, testTextSetAndNullFiltersExportCanonically); provenance: resources/test-ownership/v1.json"
  remain_in_app_or_consumer:
    - "SQL/database matrix"
    - "policy-before-query"
    - "authorization and generation fences"
    - "cryptographic envelope authenticity and key lifecycle"
    - "transaction/concurrency and recovery"
    - "export/delivery/adapters"
  split_tests: []
  prohibited_duplicates:
    - "Do not retain moved implementation tests in App/SDK after the separate verified adoption."
  corpora:
    - "resources/canonical-conformance.json"
documentation:
  charter: "CHARTER.md"
  readme: "README.md"
  public_api: "docs/public-api.md"
  architecture: "docs/architecture.md"
  integration_or_consumer: "docs/integration.md"
  examples:
    - "examples/consumer.php"
  changelog_record: "CHANGELOG.md / 0.1.3"
release_expectations:
  version_policy: "SemVer maintenance release 0.1.3 after human merge. Direct Kumwe dependencies use coherent exact published stable versions. Independent final release verification precedes App adoption."
  expected_artifact_types:
    - "Composer source zip"
  required_checks:
    - "composer check"
    - "composer security:audit"
    - "composer clean-consumer"
    - "review dependency ceiling"
    - "immutable release and source/artifact manifests independently attested"
  required_registry_or_installer: "Composer"
  required_external_attestation: true
consumer_contract:
  permitted_only_when:
    - "Human merges package PR"
    - "Immutable upstream dependency releases and target release are independently verified"
    - "External RELEASE-ATTESTATION.yaml exists and matches all source/artifact identities"
  consumer_repository: "https://github.com/kumwe/app"
  dependency_or_native_change: "Exact-pin the reviewed immutable package release and remove the former implementation. Never use this development branch as a released dependency."
  namespace_or_api_replacements:
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/AggregateFunction.php\",\"target_path\":\"src/AggregateFunction.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/BooleanFilter.php\",\"target_path\":\"src/BooleanFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/BooleanOperator.php\",\"target_path\":\"src/BooleanOperator.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/BusinessRecordCursor.php\",\"target_path\":\"src/BusinessRecordCursor.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/BusinessRecordSearch.php\",\"target_path\":\"src/BusinessRecordSearch.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/BusinessRecordSort.php\",\"target_path\":\"src/BusinessRecordSort.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/ComparisonFilter.php\",\"target_path\":\"src/ComparisonFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/ComparisonOperator.php\",\"target_path\":\"src/ComparisonOperator.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/CursorPosition.php\",\"target_path\":\"src/CursorPosition.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/NullFilter.php\",\"target_path\":\"src/NullFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/QueryCanonicalizer.php\",\"target_path\":\"src/QueryCanonicalizer.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/QueryGraphGuard.php\",\"target_path\":\"src/QueryGraphGuard.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/QueryIdentifier.php\",\"target_path\":\"src/QueryIdentifier.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/QueryValue.php\",\"target_path\":\"src/QueryValue.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordAggregate.php\",\"target_path\":\"src/RecordAggregate.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordCursor.php\",\"target_path\":\"src/RecordCursor.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordFilter.php\",\"target_path\":\"src/RecordFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordProjection.php\",\"target_path\":\"src/RecordProjection.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordQuerySpecification.php\",\"target_path\":\"src/RecordQuerySpecification.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordSearch.php\",\"target_path\":\"src/RecordSearch.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RecordSort.php\",\"target_path\":\"src/RecordSort.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RelationFilter.php\",\"target_path\":\"src/RelationFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/RelationQuantifier.php\",\"target_path\":\"src/RelationQuantifier.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/SetFilter.php\",\"target_path\":\"src/SetFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/SortDirection.php\",\"target_path\":\"src/SortDirection.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/TextFilter.php\",\"target_path\":\"src/TextFilter.php\",\"extraction_kind\":\"whole_file\"}"
    - "{\"old_owner\":\"extension-sdk\",\"source_path\":\"src/Spi/BusinessRecord/Query/TextOperator.php\",\"target_path\":\"src/TextOperator.php\",\"extraction_kind\":\"whole_file\"}"
  files_to_update:
    - "composer.json"
    - "composer.lock"
    - "container configuration"
    - "capability index"
    - "migration ledger"
    - "CHANGELOG.md"
  files_to_remove:
    - "src/Spi/BusinessRecord/Query/AggregateFunction.php"
    - "src/Spi/BusinessRecord/Query/BooleanFilter.php"
    - "src/Spi/BusinessRecord/Query/BooleanOperator.php"
    - "src/Spi/BusinessRecord/Query/BusinessRecordCursor.php"
    - "src/Spi/BusinessRecord/Query/BusinessRecordSearch.php"
    - "src/Spi/BusinessRecord/Query/BusinessRecordSort.php"
    - "src/Spi/BusinessRecord/Query/ComparisonFilter.php"
    - "src/Spi/BusinessRecord/Query/ComparisonOperator.php"
    - "src/Spi/BusinessRecord/Query/CursorPosition.php"
    - "src/Spi/BusinessRecord/Query/NullFilter.php"
    - "src/Spi/BusinessRecord/Query/QueryCanonicalizer.php"
    - "src/Spi/BusinessRecord/Query/QueryGraphGuard.php"
    - "src/Spi/BusinessRecord/Query/QueryIdentifier.php"
    - "src/Spi/BusinessRecord/Query/QueryValue.php"
    - "src/Spi/BusinessRecord/Query/RecordAggregate.php"
    - "src/Spi/BusinessRecord/Query/RecordCursor.php"
    - "src/Spi/BusinessRecord/Query/RecordFilter.php"
    - "src/Spi/BusinessRecord/Query/RecordProjection.php"
    - "src/Spi/BusinessRecord/Query/RecordQuerySpecification.php"
    - "src/Spi/BusinessRecord/Query/RecordSearch.php"
    - "src/Spi/BusinessRecord/Query/RecordSort.php"
    - "src/Spi/BusinessRecord/Query/RelationFilter.php"
    - "src/Spi/BusinessRecord/Query/RelationQuantifier.php"
    - "src/Spi/BusinessRecord/Query/SetFilter.php"
    - "src/Spi/BusinessRecord/Query/SortDirection.php"
    - "src/Spi/BusinessRecord/Query/TextFilter.php"
    - "src/Spi/BusinessRecord/Query/TextOperator.php"
  tests_to_remove:
    - "{\"owner\":\"extension-sdk\",\"baseline_commit\":\"e8ec23f155c5836c6bd083f154a8efb6e50aec66\",\"path\":\"tests/Case/RecordQueryBoundaryTest.php\",\"methods\":[\"testCursorBoundariesPreserveBytesWithoutClaimingAuthentication\",\"testDigestExcludesOnlyCursorAndCanonicalizesSearchFieldOrder\",\"testProjectionAndPageLimitsAreInclusiveAndDuplicatesCannotHideCost\",\"testDepthRelationAndOperationBudgetsAreOwnedByTheGrammar\",\"testForeignFilterCannotLieAboutItsComplexityOrExecuteCallbacks\"],\"retained_methods\":[],\"remove_whole_file\":true}"
    - "{\"owner\":\"extension-sdk\",\"baseline_commit\":\"e8ec23f155c5836c6bd083f154a8efb6e50aec66\",\"path\":\"tests/Case/RecordQueryGrammarTest.php\",\"methods\":[\"testQueryValuesAreBoundedTypedScalars\",\"testComparisonFilterRefusesApproximateAndNullLiterals\",\"testBooleanFilterBoundsItsFanOut\",\"testTextSetAndNullFiltersExportCanonically\"],\"retained_methods\":[],\"remove_whole_file\":true}"
  tests_to_retain_or_add:
    - "Host responsibility cases listed above"
    - "Native parity against committed semantic corpus where applicable"
  di_or_provisioning_changes: []
  capability_index_changes:
    - "Record actual release and package responsibility without declaring composed roadmap completion."
  changelog_and_evidence_changes:
    - "Record immutable artifact, attestation and remaining host acceptance gates."
  verification_commands:
    - "composer check"
    - "composer clean-consumer"
    - "App affected integration train and platform matrix"
governance:
  completion_claim: false
decisions:
  - "Canonical namespace and approved value behavior retained."
  - "No host authority or persistence moves into the package."
  - "See CHARTER.md for explicit dependency amendments; no release approval is inferred."
blockers:
  - "Independent verification of the final maintenance release and its complete dependency closure remains a separate task before App adoption."
---

# Record Query release record

This record binds source ownership, public manifests, consumer mappings and test
responsibilities. Baseline paths are compatibility evidence; consumers reconcile
them against current Core before replacing implementations.

## Package contract

The package owns a closed bounded query grammar, projections and deterministic
canonicalization. Core owns authorization, trusted definitions, database execution,
field disclosure enforcement, cursor signing secrets, persistence and delivery.

## Public API and responsibility

See [public API](public-api.md), [architecture](architecture.md) and canonical manifests.
Values use direct construction. Filter sets, cursor positions, projections and sort
collections detach caller references, preserving admitted query/disclosure intent.
A validated specification or digest is not an authorization decision.

## Dependencies and semantic inputs

Record Values owns shared normalization, Business Definition owns definition semantics,
and Conversion owns numeric conversion. Exact versions are declared in Composer.
The canonical conformance proof compares frozen SDK and definition encoders over
13 accepted and eight refused inputs, retaining no-float, depth32, width512 and UTF-8
boundaries. Query literals keep narrower admission before shared normalization.

## Consumer contract

Core supplies authorized scope and definitions, compiles validated queries, applies
access and field permissions before reads, counts, paging, aggregates and exports,
and owns cursor integrity and replay binding. The package exports neither SQL
execution nor signing secrets. See [integration](integration.md).

## Test ownership

Package tests own grammar admission, canonical bytes, bounded query values, immutability
and conformance. The [test ownership contract](test-ownership.md) and resource manifest
retain source provenance. Core keeps database, query-isolation, disclosure, cursor
security, policy-change, transaction and delivery integration tests.

## Consumer verification

Independently verify exact package/dependency releases, source identities, archives
and manifest digests. Run affected Core integration suites after composition. Scan
current imports, signatures, configuration, escaped strings, fixtures and dynamically
composed names before removing duplicate implementations.

## Compatibility and drift

Grammar, canonical query bytes, value admission and projection meaning are compatibility
contracts. Reconcile recorded sources and tests with current Core, preserving newer
portable behavior upstream and host-specific authority locally. Release evidence is immutable.

## Validation

Install the pinned Node schema toolchain and run `composer check`. Complete schema
validation, refusal fixtures, PHP behavior/static checks, governance, audit, dependency
identity, release tests and no-dev authoritative archive consumption verify the source.

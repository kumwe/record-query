<?php

declare(strict_types=1);

namespace Kumwe\Record\Query\Tests\Case;

use InvalidArgumentException;
use Kumwe\Record\Query\QueryCanonicalizer;
use Kumwe\Record\Query\RecordQuerySpecification;
use Kumwe\Record\Query\Tests\TestCase;

final class CanonicalSemanticsTest extends TestCase
{
    public function testQueryDigestMatchesFrozenSdkBytes(): void
    {
        $proof = json_decode(file_get_contents(dirname(__DIR__, 2) . '/resources/canonical-conformance.json'), true, 512, JSON_THROW_ON_ERROR);
        $query = new RecordQuerySpecification();
        $this->assertSame($proof['default_query']['document'], $query->toArray(false), 'Canonical query plan retains every field.');
        $this->assertSame($proof['default_query']['digest'], $query->digest(), 'Extracted query digest retains exact SDK bytes.');
    }
    public function testNarrowLiteralAdmissionPrecedesCanonicalRecordReduction(): void
    {
        $this->assertSame('2024-02-29T10:00:00.123456+02:00', QueryCanonicalizer::value(new \DateTimeImmutable('2024-02-29T10:00:00.123456+02:00')), 'Date precision and offset retained.');
        foreach ([[],1.5,new \stdClass(),str_repeat('a', 4097),"\xff"] as $value) {
            $this->assertThrows(static fn()=>QueryCanonicalizer::value($value), InvalidArgumentException::class, 'Unsupported literal refused before digest.');
        }
    }
}

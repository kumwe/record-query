<?php

declare(strict_types=1);

namespace Kumwe\Record\Query;

/** Bounded business-record search request. @since 0.2.0 */
interface BusinessRecordSearch
{
    /** @return array<string, mixed> @since 0.2.0 */
    public function toArray(): array;
}

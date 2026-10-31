<?php

declare(strict_types=1);

namespace TomasChochola\Psr\Clock;

use DateTimeImmutable;
use DateTimeZone;
use NoDiscard;
use Override;
use Psr\Clock\ClockInterface;

/**
 * @no-named-arguments
 */
readonly class NowClock implements ClockInterface
{
    #[NoDiscard()]
    #[Override()]
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }
}

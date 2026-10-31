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
readonly class FixedClock implements ClockInterface
{
    private DateTimeImmutable $now;

    public function __construct(DateTimeImmutable $now = new DateTimeImmutable('2000-01-01T00:00:00', new DateTimeZone('UTC')))
    {
        $this->now = $now;
    }

    #[NoDiscard()]
    #[Override()]
    public function now(): DateTimeImmutable
    {
        return $this->now;
    }
}

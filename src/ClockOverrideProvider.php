<?php

declare(strict_types=1);

namespace TomasChochola\Psr\Clock;

use IteratorAggregate;
use NoDiscard;
use Override;
use Psr\Clock\ClockInterface;
use Traversable;

/**
 * @no-named-arguments
 *
 * @implements IteratorAggregate<mixed, mixed>
 */
readonly class ClockOverrideProvider implements IteratorAggregate
{
    #[NoDiscard]
    #[Override]
    public function getIterator(): Traversable
    {
        yield FixedClock::class => [FixedClock::class, 'unload'];
        yield ClockInterface::class => [FixedClock::class, 'unload'];
    }
}

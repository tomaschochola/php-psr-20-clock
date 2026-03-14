<?php

/**
 * @author Tomáš Chochola <tomaschochola@tomaschochola.cz>
 * @copyright © 2026 Tomáš Chochola <tomaschochola@tomaschochola.cz>
 *
 * @license CC-BY-ND-4.0
 *
 * @see {@link https://creativecommons.org/licenses/by-nd/4.0/} License
 * @see {@link https://github.com/tomaschochola} GitHub Profile
 * @see {@link https://github.com/sponsors/tomaschochola} GitHub Sponsors
 */

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
readonly class ClockManifest implements IteratorAggregate
{
    #[NoDiscard]
    #[Override]
    public function getIterator(): Traversable
    {
        yield FixedClock::class => [FixedClockAssembler::class, 'assemble'];

        yield NowClock::class => [NowClockAssembler::class, 'assemble'];

        yield ClockInterface::class => [NowClockAssembler::class, 'assemble'];
    }
}

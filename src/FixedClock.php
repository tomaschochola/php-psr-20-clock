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
    private readonly DateTimeImmutable $now;

    public function __construct(DateTimeImmutable $now = new DateTimeImmutable('2000-01-01T00:00:00', new DateTimeZone('UTC')))
    {
        $this->now = $now;
    }

    #[NoDiscard]
    #[Override]
    public function now(): DateTimeImmutable
    {
        return $this->now;
    }
}

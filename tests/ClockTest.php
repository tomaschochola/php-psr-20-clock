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

namespace Tests;

use DateTimeImmutable;
use DateTimeZone;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;
use TomasChochola\Psr\Clock\FixedClock;
use TomasChochola\Psr\Clock\NowClock;

/**
 * @internal
 *
 * @no-named-arguments
 */
#[CoversClass(FixedClock::class)]
#[CoversClass(NowClock::class)]
#[Small()]
final class ClockTest extends TestCase
{
    #[Test()]
    public function fixedClockReturnsConfiguredInstant(): void
    {
        $instant = new DateTimeImmutable('2026-08-04T12:34:56.123456+02:00');
        $clock = new FixedClock($instant);

        self::assertSame($instant, $clock->now());
        self::assertSame($instant, $clock->now());
    }

    #[Test()]
    public function fixedClockUsesDocumentedDefaultInstant(): void
    {
        $instant = (new FixedClock())->now();

        self::assertSame('2000-01-01T00:00:00+00:00', $instant->format('Y-m-d\TH:i:sP'));
        self::assertSame('UTC', $instant->getTimezone()->getName());
    }

    #[Test()]
    public function nowClockReturnsCurrentUtcInstant(): void
    {
        $before = new DateTimeImmutable('now', new DateTimeZone('UTC'));
        $now = (new NowClock())->now();
        $after = new DateTimeImmutable('now', new DateTimeZone('UTC'));

        self::assertGreaterThanOrEqual($before, $now);
        self::assertLessThanOrEqual($after, $now);
        self::assertSame('UTC', $now->getTimezone()->getName());
    }
}

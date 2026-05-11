<?php

declare(strict_types=1);

namespace Tests;

use ControlUIKit\BrandColorPalette;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BrandColorPaletteTest extends TestCase
{
    // --- Hex parsing ---

    #[Test]
    public function it_parses_six_char_hex_with_hash(): void
    {
        $palette = new BrandColorPalette('#FF8000');
        $this->assertSame([255, 128, 0], $palette->getBaseRgb());
    }

    #[Test]
    public function it_parses_hex_without_leading_hash(): void
    {
        $palette = new BrandColorPalette('FF8000');
        $this->assertSame([255, 128, 0], $palette->getBaseRgb());
    }

    #[Test]
    public function it_parses_three_char_hex_and_expands_it(): void
    {
        // #F80 → #FF8800
        $palette = new BrandColorPalette('#F80');
        $this->assertSame([255, 136, 0], $palette->getBaseRgb());
    }

    #[Test]
    public function it_parses_lowercase_hex(): void
    {
        $palette = new BrandColorPalette('#ff8000');
        $this->assertSame([255, 128, 0], $palette->getBaseRgb());
    }

    #[Test]
    public function it_throws_for_four_char_hex(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new BrandColorPalette('#FFFF');
    }

    #[Test]
    public function it_throws_for_five_char_hex(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new BrandColorPalette('#FFFFF');
    }

    #[Test]
    public function it_throws_for_hex_with_non_hex_characters(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new BrandColorPalette('#GGGGGG');
    }

    #[Test]
    public function it_throws_with_descriptive_message_for_invalid_hex(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/hex code|comma-separated RGB/i');
        new BrandColorPalette('ZZZZZZ');
    }

    // --- RGB parsing ---

    #[Test]
    public function it_parses_comma_separated_rgb(): void
    {
        $palette = new BrandColorPalette('255,128,0');
        $this->assertSame([255, 128, 0], $palette->getBaseRgb());
    }

    #[Test]
    public function it_parses_rgb_with_spaces_around_commas(): void
    {
        $palette = new BrandColorPalette('255, 128, 0');
        $this->assertSame([255, 128, 0], $palette->getBaseRgb());
    }

    #[Test]
    public function it_accepts_rgb_boundary_values(): void
    {
        $palette = new BrandColorPalette('0,0,0');
        $this->assertSame([0, 0, 0], $palette->getBaseRgb());

        $palette = new BrandColorPalette('255,255,255');
        $this->assertSame([255, 255, 255], $palette->getBaseRgb());
    }

    #[Test]
    public function it_throws_when_rgb_has_only_two_parts(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exactly 3 comma-separated values');
        new BrandColorPalette('255,128');
    }

    #[Test]
    public function it_throws_when_rgb_has_four_parts(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exactly 3 comma-separated values');
        new BrandColorPalette('255,128,0,64');
    }

    #[Test]
    public function it_throws_when_rgb_part_is_alphabetic(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid RGB value');
        new BrandColorPalette('255,abc,0');
    }

    #[Test]
    public function it_throws_when_rgb_part_is_a_float(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new BrandColorPalette('255,12.5,0');
    }

    #[Test]
    public function it_throws_when_rgb_value_exceeds_255(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('between 0 and 255');
        new BrandColorPalette('255,0,300');
    }

    // --- Palette generation ---

    #[Test]
    public function it_returns_palette_with_ten_named_shades(): void
    {
        $palette = new BrandColorPalette('#FF8000');
        $this->assertSame(
            [50, 100, 200, 300, 400, 500, 600, 700, 800, 900],
            array_keys($palette->getPalette()),
        );
    }

    #[Test]
    public function it_shade_500_is_the_base_color(): void
    {
        $palette = new BrandColorPalette('100,150,200');
        $this->assertSame([100, 150, 200], $palette->getPalette()['500']);
    }

    #[Test]
    public function it_shade_50_applies_plus_200_brightness_diff(): void
    {
        $palette = new BrandColorPalette('50,50,50');
        $this->assertSame([250, 250, 250], $palette->getPalette()['50']); // 50+200=250
    }

    #[Test]
    public function it_shade_100_applies_plus_160_brightness_diff(): void
    {
        $palette = new BrandColorPalette('50,50,50');
        $this->assertSame([210, 210, 210], $palette->getPalette()['100']); // 50+160=210
    }

    #[Test]
    public function it_shade_900_applies_minus_140_brightness_diff(): void
    {
        $palette = new BrandColorPalette('200,200,200');
        $this->assertSame([60, 60, 60], $palette->getPalette()['900']); // 200-140=60
    }

    #[Test]
    public function it_clamps_palette_values_at_255(): void
    {
        $palette = new BrandColorPalette('255,255,255');
        $this->assertSame([255, 255, 255], $palette->getPalette()['50']); // 255+200 clamped
    }

    #[Test]
    public function it_clamps_palette_values_at_0(): void
    {
        $palette = new BrandColorPalette('0,0,0');
        $this->assertSame([0, 0, 0], $palette->getPalette()['900']); // 0-140 clamped
    }

    #[Test]
    public function it_handles_mixed_channel_clamping(): void
    {
        // Red=200 → shade 50 (+200) → 255 (clamped). Green=10 → shade 900 (-140) → 0 (clamped).
        $palette = new BrandColorPalette('200,10,128');
        $shades = $palette->getPalette();

        $this->assertSame(255, $shades['50'][0]); // R clamped
        $this->assertSame(0, $shades['900'][1]);  // G clamped
        $this->assertGreaterThanOrEqual(0, $shades['900'][2]);
        $this->assertLessThanOrEqual(255, $shades['50'][2]);
    }

    #[Test]
    public function it_returns_each_shade_as_a_valid_rgb_triple(): void
    {
        $palette = new BrandColorPalette('#AD28FF');

        foreach ($palette->getPalette() as $shade => $rgb) {
            $this->assertCount(3, $rgb, "Shade {$shade} must have 3 channels");

            foreach ($rgb as $channel) {
                $this->assertGreaterThanOrEqual(0, $channel, "Channel in shade {$shade} must be >= 0");
                $this->assertLessThanOrEqual(255, $channel, "Channel in shade {$shade} must be <= 255");
            }
        }
    }

    // --- Accessors ---

    #[Test]
    public function it_returns_base_rgb(): void
    {
        $palette = new BrandColorPalette('100,150,200');
        $this->assertSame([100, 150, 200], $palette->getBaseRgb());
    }

    #[Test]
    public function it_returns_base_hex_in_uppercase_with_hash(): void
    {
        $palette = new BrandColorPalette('255,128,0');
        $this->assertSame('#FF8000', $palette->getBaseHex());
    }

    #[Test]
    public function it_normalises_lowercase_hex_to_uppercase_in_get_base_hex(): void
    {
        $palette = new BrandColorPalette('#ff8000');
        $this->assertSame('#FF8000', $palette->getBaseHex());
    }

    #[Test]
    public function it_round_trips_rgb_through_hex(): void
    {
        $palette = new BrandColorPalette('173,40,255');
        $this->assertSame('#AD28FF', $palette->getBaseHex());
        $this->assertSame([173, 40, 255], $palette->getBaseRgb());
    }

    #[Test]
    public function it_produces_same_result_from_hex_and_rgb_for_same_color(): void
    {
        $fromHex = new BrandColorPalette('#FF8000');
        $fromRgb = new BrandColorPalette('255,128,0');

        $this->assertSame($fromHex->getBaseRgb(), $fromRgb->getBaseRgb());
        $this->assertSame($fromHex->getBaseHex(), $fromRgb->getBaseHex());
        $this->assertSame($fromHex->getPalette(), $fromRgb->getPalette());
    }
}

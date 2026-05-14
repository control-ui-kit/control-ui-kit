<?php

declare(strict_types=1);

namespace Tests;

use ControlUIKit\GreyColors;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GreyColorsTest extends TestCase
{
    private GreyColors $greys;

    private const EXPECTED_SHADES = [
        50, 100, 150, 200, 250, 300, 350, 400, 450,
        500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000,
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->greys = new GreyColors;
    }

    // --- getData() ---

    #[Test]
    public function it_returns_data_for_slate(): void
    {
        $data = $this->greys->getData('slate');
        $this->assertSame(self::EXPECTED_SHADES, array_keys($data));
    }

    #[Test]
    public function it_returns_data_for_gray(): void
    {
        $data = $this->greys->getData('gray');
        $this->assertSame(self::EXPECTED_SHADES, array_keys($data));
    }

    #[Test]
    public function it_returns_data_for_classic(): void
    {
        $data = $this->greys->getData('classic');
        $this->assertSame(self::EXPECTED_SHADES, array_keys($data));
    }

    #[Test]
    public function it_returns_data_for_neutral(): void
    {
        $data = $this->greys->getData('neutral');
        $this->assertSame(self::EXPECTED_SHADES, array_keys($data));
    }

    #[Test]
    public function it_returns_data_for_stone(): void
    {
        $data = $this->greys->getData('stone');
        $this->assertSame(self::EXPECTED_SHADES, array_keys($data));
    }

    #[Test]
    public function it_returns_data_for_green(): void
    {
        $data = $this->greys->getData('green');
        $this->assertSame(self::EXPECTED_SHADES, array_keys($data));
    }

    #[Test]
    public function it_returns_empty_array_for_unknown_palette(): void
    {
        $this->assertSame([], $this->greys->getData('unknown'));
    }

    #[Test]
    public function it_each_shade_value_is_a_valid_rgb_triple(): void
    {
        foreach (['slate', 'gray', 'classic', 'neutral', 'stone', 'green'] as $palette) {
            foreach ($this->greys->getData($palette) as $shade => $rgb) {
                $this->assertCount(3, $rgb, "{$palette} shade {$shade} must have 3 channels");

                foreach ($rgb as $channel) {
                    $this->assertGreaterThanOrEqual(0, $channel);
                    $this->assertLessThanOrEqual(255, $channel);
                }
            }
        }
    }

    // --- Specific shade values ---

    #[Test]
    public function it_slate_50_has_correct_rgb(): void
    {
        $this->assertSame([248, 250, 252], $this->greys->getData('slate')['50']);
    }

    #[Test]
    public function it_slate_1000_has_correct_rgb(): void
    {
        $this->assertSame([5, 8, 14], $this->greys->getData('slate')['1000']);
    }

    #[Test]
    public function it_gray_500_has_correct_rgb(): void
    {
        $this->assertSame([107, 114, 128], $this->greys->getData('gray')['500']);
    }

    #[Test]
    public function it_classic_50_has_correct_rgb(): void
    {
        $this->assertSame([250, 250, 250], $this->greys->getData('classic')['50']);
    }

    #[Test]
    public function it_neutral_50_has_correct_rgb(): void
    {
        $this->assertSame([250, 250, 250], $this->greys->getData('neutral')['50']);
    }

    #[Test]
    public function it_stone_50_has_correct_rgb(): void
    {
        $this->assertSame([250, 250, 249], $this->greys->getData('stone')['50']);
    }

    #[Test]
    public function it_green_50_has_correct_rgb(): void
    {
        $this->assertSame([248, 251, 248], $this->greys->getData('green')['50']);
    }

    // --- getScale() ---

    #[Test]
    public function it_returns_scale_for_slate(): void
    {
        $scale = $this->greys->getScale('slate');
        $this->assertStringContainsString('--gray-50:', $scale);
        $this->assertStringContainsString('--gray-1000:', $scale);
    }

    #[Test]
    public function it_returns_scale_for_gray(): void
    {
        $scale = $this->greys->getScale('gray');
        $this->assertStringContainsString('--gray-50:', $scale);
    }

    #[Test]
    public function it_returns_scale_for_classic(): void
    {
        $this->assertStringContainsString('--gray-50:', $this->greys->getScale('classic'));
    }

    #[Test]
    public function it_returns_scale_for_neutral(): void
    {
        $this->assertStringContainsString('--gray-50:', $this->greys->getScale('neutral'));
    }

    #[Test]
    public function it_returns_scale_for_stone(): void
    {
        $this->assertStringContainsString('--gray-50:', $this->greys->getScale('stone'));
    }

    #[Test]
    public function it_returns_scale_for_green(): void
    {
        $this->assertStringContainsString('--gray-50:', $this->greys->getScale('green'));
    }

    #[Test]
    public function it_returns_empty_string_for_unknown_scale(): void
    {
        $this->assertSame('', $this->greys->getScale('unknown'));
    }

    #[Test]
    public function it_scale_format_includes_hex_comment(): void
    {
        $scale = $this->greys->getScale('slate');
        $this->assertStringContainsString('/* #', $scale);
    }

    #[Test]
    public function it_scale_contains_rgb_values_separated_by_spaces(): void
    {
        // e.g. "--gray-50: 248 250 252;"
        $scale = $this->greys->getScale('slate');
        $this->assertMatchesRegularExpression('/--gray-50:\s+\d+ \d+ \d+;/', $scale);
    }

    #[Test]
    public function it_scale_contains_all_twenty_shades(): void
    {
        $scale = $this->greys->getScale('gray');

        foreach (self::EXPECTED_SHADES as $shade) {
            $this->assertStringContainsString("--gray-{$shade}:", $scale, "Scale missing --gray-{$shade}");
        }
    }

    // --- Individual palette methods ---

    #[Test]
    public function slate_method_matches_getscale_slate(): void
    {
        $this->assertSame($this->greys->getScale('slate'), $this->greys->slate());
    }

    #[Test]
    public function gray_method_matches_getscale_gray(): void
    {
        $this->assertSame($this->greys->getScale('gray'), $this->greys->gray());
    }

    #[Test]
    public function classic_method_matches_getscale_classic(): void
    {
        $this->assertSame($this->greys->getScale('classic'), $this->greys->classic());
    }

    #[Test]
    public function neutral_method_matches_getscale_neutral(): void
    {
        $this->assertSame($this->greys->getScale('neutral'), $this->greys->neutral());
    }

    #[Test]
    public function stone_method_matches_getscale_stone(): void
    {
        $this->assertSame($this->greys->getScale('stone'), $this->greys->stone());
    }

    #[Test]
    public function green_method_matches_getscale_green(): void
    {
        $this->assertSame($this->greys->getScale('green'), $this->greys->green());
    }

    // --- Palette distinctness ---

    #[Test]
    public function it_palettes_produce_distinct_50_values(): void
    {
        $shade50s = [];

        foreach (['slate', 'gray', 'classic', 'neutral', 'stone', 'green'] as $palette) {
            $shade50s[$palette] = $this->greys->getData($palette)['50'];
        }

        // At least some palettes should differ at shade 50
        $unique = array_unique(array_map('serialize', $shade50s));
        $this->assertGreaterThan(1, count($unique));
    }
}

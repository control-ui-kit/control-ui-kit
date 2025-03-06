<?php

namespace Tests\Helpers;

use ControlUIKit\Helpers\UrlManipulation;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UrlManipulationTest extends TestCase
{
    #[Test]
    public function a_basic_url_can_be_appended(): void
    {
        $url = 'https://example.com';
        $query = 'new=parameter';
        $expected = 'https://example.com?new=parameter';

        self::assertSame($expected, (new UrlManipulation)->url($url)->append($query));
    }

    #[Test]
    public function a_basic_url_does_not_double_parameters_if_they_are_already_present(): void
    {
        $url = 'https://example.com?new=parameter';
        $query = 'new=parameter';
        $expected = 'https://example.com?new=parameter';

        self::assertSame($expected, (new UrlManipulation)->url($url)->append($query));
    }

    #[Test]
    public function a_parameter_url_can_be_appended(): void
    {
        $url = 'https://example.com?previous=option';
        $query = 'new=parameter';
        $expected = 'https://example.com?previous=option&new=parameter';

        self::assertSame($expected, (new UrlManipulation)->url($url)->append($query));
    }

    #[Test]
    public function an_anchor_url_can_be_appended(): void
    {
        $url = 'https://example.com#anchor';
        $query = 'new=parameter';
        $expected = 'https://example.com?new=parameter#anchor';

        self::assertSame($expected, (new UrlManipulation)->url($url)->append($query));
    }

    #[Test]
    public function a_parameter_anchor_url_can_be_appended(): void
    {
        $url = 'https://example.com?previous=option#anchor';
        $query = 'new=parameter';
        $expected = 'https://example.com?previous=option&new=parameter#anchor';

        self::assertSame($expected, (new UrlManipulation)->url($url)->append($query));
    }

    #[Test]
    public function a_parameter_anchor_url_can_be_appended_with_anchor(): void
    {
        $url = 'https://example.com?previous=option#anchor';
        $query = 'new=parameter';
        $anchor = 'new-anchor';
        $expected = 'https://example.com?previous=option&new=parameter#new-anchor';

        self::assertSame($expected, (new UrlManipulation)->url($url)->withAnchor($anchor)->append($query));
    }

    #[Test]
    public function a_parameter_url_can_be_appended_with_anchor_while_passing_in_empty_anchor(): void
    {
        $url = 'https://example.com?previous=option#anchor';
        $query = 'new=parameter';
        $anchor = '';
        $expected = 'https://example.com?previous=option&new=parameter#anchor';

        self::assertSame($expected, (new UrlManipulation)->url($url)->withAnchor($anchor)->append($query));
    }

    #[Test]
    public function a_parameter_url_can_be_appended_with_anchor_while_passing_in_null_anchor(): void
    {
        $url = 'https://example.com?previous=option#anchor';
        $query = 'new=parameter';
        $anchor = null;
        $expected = 'https://example.com?previous=option&new=parameter#anchor';

        self::assertSame($expected, (new UrlManipulation)->url($url)->withAnchor($anchor)->append($query));
    }
}

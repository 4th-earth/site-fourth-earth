<?php
declare(strict_types=1);

namespace FE\Tests\Components;

use PHPUnit\Framework\TestCase;

use FE\Components\PageTitle;

class PageTitleTests extends TestCase
{
    /**
     * @test
     */
    public function can_override_base_title(): void // phpcs:ignore
    {
        $expected = 'Test alt';
        $result   = PageTitle::init(
            __DIR__ . '/../test-content/content-main',
            '/'
        )->overrideBaseTitle('Test alt')->title();

        $this->assertSame($expected, $result);

        $expected = 'Subfolder | Test alt';
        $result   = PageTitle::init(
            __DIR__ . '/../test-content/content-main',
            '/subfolder/'
        )->overrideBaseTitle('Test alt')->title();

        $this->assertSame($expected, $result);
    }

    /**
     * @test
     */
    public function root_title_for_site(): void // phpcs:ignore
    {
        $expected = 'Test';
        $result   = PageTitle::init(
            __DIR__ . '/../test-content/content-main',
            '/'
        )->title();

        $this->assertSame($expected, $result);

        $expected = 'Subfolder | Test';
        $result   = PageTitle::init(
            __DIR__ . '/../test-content/content-main',
            '/subfolder/'
        )->title();

        $this->assertSame($expected, $result);

        $expected = 'Test alt';
        $result   = PageTitle::init(
            __DIR__ . '/../test-content/content-alt',
            '/'
        )->title();

        $this->assertSame($expected, $result);

        $expected = 'Test';
        $result   = PageTitle::init(
            __DIR__ . '/../test-content/content-main',
            '/does-not-exist'
        )->title();

        $this->assertSame($expected, $result);
    }

    /**
     * @test
     */
    public function page_title_exists(): void // phpcs:ignore
    {
        $this->assertTrue(
            class_exists(PageTitle::class)
        );
    }
}

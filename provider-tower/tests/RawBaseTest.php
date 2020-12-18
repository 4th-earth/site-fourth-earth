<?php
declare(strict_types=1);

use FourthEarth\Site\Tests;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use FourthEarth\Site\Raw\Attempt;
use FourthEarth\Site\Raw\Result;

class RawBaseTest extends TestCase
{
    /**
     * @test
     */
    public function attempt_single_battery()
    {
        $result = Attempt::fold(1)->batteries(
                ["label" => "physical", "value" => 1, "max" => 10]
            )->unfold();

        $this->assertTrue(is_a($result, Result::class));
        $this->assertTrue($result->succeeded());

        $result = Attempt::fold(1)
            ->batteries(
                ["label" => "physical", "value" => 1, "max" => 10]
            )->limit(0)->unfold();

        $this->assertEquals(1, $result->batteryNamed("physical")->value);
        $this->assertTrue($result->diceBag()->isCast());
    }

    /**
     * @test
     */
    public function attempt_battery_with_overflow()
    {
        $attempt = Attempt::fold(1)->batteries(
            ["label" => "physical", "value" => 1, "max" => 10],
            ["label" => "mental", "value" => 10, "max" => 10],
            ["label" => "spirit", "value" => 10, "max" => 10]
        );

        $result = $attempt->unfold();

        $this->assertEquals(0, $result->batteryNamed("physical")->value);
        $this->assertEquals(10, $result->batteryNamed("mental")->value);
        $this->assertEquals(10, $result->batteryNamed("spirit")->value);

        $attempt = $attempt->attempt(5);

        $result = $attempt->unfold();

        $this->assertEquals(0, $result->batteryNamed("physical")->value);
        $this->assertEquals(5, $result->batteryNamed("mental")->value);
        $this->assertEquals(5, $result->batteryNamed("spirit")->value);
    }

    /**
     * @test
     */
    public function attempt_battery_with_overflow_and_cannot_be_zero()
    {
        $attempt = Attempt::fold(6)->batteries(
            ["label" => "health", "value" => 6, "max" => 10, "can_be_zero" => false],
            ["label" => "physical", "value" => 0, "max" => 10],
            ["label" => "mental", "value" => 5, "max" => 10],
            ["label" => "spirit", "value" => 5, "max" => 10]
        );

        $result = $attempt->unfold();

        $this->assertEquals(1, $result->batteryNamed("health")->value);
        $this->assertEquals(0, $result->batteryNamed("physical")->value);
        $this->assertEquals(3, $result->batteryNamed("mental")->value);
        $this->assertEquals(4, $result->batteryNamed("spirit")->value);

        $attempt = $attempt->attempt(1, 2);

        $result = $attempt->unfold();

        $this->assertEquals(1, $result->batteryNamed("health")->value);
        $this->assertEquals(0, $result->batteryNamed("physical")->value);
        $this->assertEquals(2, $result->batteryNamed("mental")->value);
        $this->assertEquals(2, $result->batteryNamed("spirit")->value);

        $attempt = $attempt->attempt(3);

        $result = $attempt->unfold();

        $this->assertEquals(0, $result->batteryNamed("health")->value);
        $this->assertEquals(0, $result->batteryNamed("physical")->value);
        $this->assertEquals(0, $result->batteryNamed("mental")->value);
        $this->assertEquals(0, $result->batteryNamed("spirit")->value);
    }
}

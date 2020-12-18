<?php
declare(strict_types=1);

namespace FourthEarth\Site\Raw;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

use Eightfold\Shoop\Shoop;
use JoshBruce\DiceBag\DiceBag;

use FourthEarth\Site\Raw\Result;

class Attempt extends Fold
{
    private $canBeZero = true;

    private $level = 0;

    private $target    = [];
    private $overflows = [];

    private $nextOverflowToUse = PHP_INT_MAX;

    private $limit = INF;

    private $diceSides = [
        "0",         // 0 - 100%
        "d2",        // 1 - 50%
        "d4",        // 2 - 25%
        "d6",        // 3 - ~17%
        "d8",        // 4 - ~12%
        "d10",       // 5 - 10%
        "d12",       // 6 - ~8%
        "d20",       // 7 - 5%
        PHP_INT_MAX, // 8 - Failure without help
        INF          // 9 - Only creator players
    ];

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(
        int $level = 0,
        int $nextOverflowToUse = PHP_INT_MAX
    )
    {
        $this->attempt($level, $nextOverflowToUse);
    }

    public function batteries(array $target, array ...$overflows): Attempt
    {
        $this->target    = $target;
        $this->overflows = $overflows;
        return $this;
    }

    public function limit(int $limit = INF): Attempt
    {
        $this->limit = $limit;
        return $this;
    }

    private function costPerIncrease(): int
    {
        return count($this->overflows);
    }

    private function totalOverflow(): int
    {
        $overflows = $this->overflows;
        $total = 0;
        foreach ($overflows as $overflow) {
            $total += $overflow["value"];
        }
        return $total;
    }

    private function canIncreaseTarget(): bool
    {
        return $this->totalOverflow() > $this->costPerIncrease();
    }

    private function increasedTarget(): bool
    {
        if (! $this->canIncreaseTarget()) {
            return false;
        }

        $costPer = $this->costPerIncrease();
        $overflowCount = count($this->overflows);
        $overflowsDecreased = 0;
        while($overflowsDecreased < $costPer) {
            for ($i = 0; $i < $overflowCount; $i++) {
                $index = $this->nextOverflowToUse;

                if ($this->overflows[$index]["value"] > 0) {
                    $this->overflows[$index]["value"] -= 1;

                    $overflowsDecreased += 1;
                    if ($overflowsDecreased === $costPer) {
                        $this->target["value"] += 1;
                        return true;

                    }
                }

                $this->nextOverflowToUse++;
                if ($this->nextOverflowToUse === $overflowCount) {
                    $this->nextOverflowToUse = 0;

                }
            }
        }
        return false;
    }

    private function limitForLoweringChallengeLevel(): int
    {
        $limit = $this->limit;
        if ($this->level < $limit or $this->limit === 0) {
            $limit = $this->level;
        }
        return $limit;
    }

    private function loweredChallengeLevel()
    {
        $limit = $this->limitForLoweringChallengeLevel();
        if ($this->limit === 0) {
            return $limit;
        }

        $iterations = range(1, $limit);
        foreach ($iterations as $iter) {
            if ($limit === 0) {
                break;
            }

            if ($this->target["value"] === 0) {
                if ($this->canIncreaseTarget()) {
                    $this->increasedTarget();

                } else {
                    break;

                }
            }

            if ($this->target["value"] > 0) {
                $this->target["value"] -= 1;
                $limit -= 1;

            }
        }
        return $limit;
    }

    private function isTerminalFailure(): bool
    {
        return $this->target["value"] === 0 and
            isset($this->target["can_be_zero"]) and
            ! $this->target["can_be_zero"];
    }

    public function unfold()
    {
        $limit = $this->loweredChallengeLevel();

        if ($this->isTerminalFailure()) {
            if ($this->canIncreaseTarget()) {
                $this->increasedTarget();

            } else {
                for ($i = 0; $i < count($this->overflows); $i++) {
                    $this->overflows[$i]["value"] = 0;

                }
            }
        }

        if ($limit === 0 and $this->limit === INF) {
            return Result::fold(new DiceBag, $this->target, ...$this->overflows);
        }

        $level  = $limit;
        $sides  = $this->diceSides[$level];
        $pool   = 1; // TODO: Adjust by rank
        $method = "roll". $pool . $sides;
        $bag    = DiceBag::{$method}();

        return Result::fold($bag, $this->target, ...$this->overflows);
    }

    public function attempt(
        int $level = 0,
        int $nextOverflowToUse = PHP_INT_MAX
    ): Attempt
    {
        $this->level = $level;

        if ($nextOverflowToUse === PHP_INT_MAX) {
            $this->nextOverflowToUse = 0;

        } else {
            $this->nextOverflowToUse = $nextOverflowToUse;

        }
        return $this;
    }
}

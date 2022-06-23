<?php
declare(strict_types=1);

namespace FourthEarth\Site\Raw;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

use \stdClass;

use Eightfold\Shoop\Shoop;

use JoshBruce\DiceBag\DiceBag;

class Result extends Fold
{
    private $diceBag = null;

    private $target = [];

    private $overflows = [];

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(DiceBag $diceBag, array $target, array ...$overflows)
    {
        $this->diceBag   = $diceBag;
        $this->target    = $target;
        $this->overflows = $overflows;
    }

    public function diceBag(): DiceBag
    {
        return $this->diceBag;
    }

    public function succeeded(): bool
    {
        if ($this->diceBag->isCast()) {
            return $this->diceBag->hasEqualTo(1);
        }
        return $this->batteriesHaveValues();
    }

    public function failed(): bool
    {
        return ! $this->succeeded();
    }

    public function batteryNamed(string $name): stdClass
    {
        $batteries = $this->batteries();
        foreach ($batteries as $battery) {
            if ($battery["label"] === $name) {
                return Shoop::this($battery)->efToTuple();
            }
        }
    }

    private function batteries(): array
    {
        return array_merge([$this->target], $this->overflows);
    }

    private function batteriesHaveValues(): bool
    {
        $batteries = $this->batteries();
        $hasValues = [];
        foreach ($batteries as $battery) {
            if ($battery["value"] > 0) {
                $hasValues[] = true;

            } elseif (isset($battery["can_be_zero"]) and
                ! $battery["can_be_zero"]
            ) {
                $hasValues[] = false;

            } else {
                $hasValues[] = true;

            }
        }

        foreach ($hasValues as $bool) {
            if ($bool) {
                return true;
            }
        }
        return false;
    }
}

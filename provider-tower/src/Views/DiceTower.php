<?php

namespace FourthEarth\Tower\Views;

use Illuminate\View\Component;

use Eightfold\LaravelMarkup\UIKit;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

use FourthEarth\Tower\Views\DicePool;

class DiceTower extends Fold
{
    private $count = 1;
    private $showResults = false;

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(int $count = 1, bool $showResults = false)
    {
        $this->count = $count;
        $this->showResults = $showResults;
    }

    public function unfold()
    {
        $pools = range(1, $this->count);
        $renderedPools = "";
        foreach ($pools as $pool) {
            $renderedPools .= DicePool::fold($pool, $this->showResults)->unfold();
        }

        return UIKit::form(
            "post /",
            $renderedPools,
            UIKit::input()->attr("type hidden", "name count", "value ". $this->count),
            UIKit::button("roll all dice")->attr("id roll-dice-button", "name roll", "value roll")
        )->submit("add pool", "id add-pool-button", "name add", "value add")->attr("id dice-tower");
    }
}

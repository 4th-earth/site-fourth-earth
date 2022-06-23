<?php

namespace FourthEarth\Tower\Views;

use Illuminate\View\Component;

use Eightfold\LaravelMarkup\UIKit;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

class Page extends Fold
{
    private $count = 1;
    private $showResults = false;

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(int $count = 1, bool $showResults = false)
    {
        $this->count       = $count;
        $this->showResults = $showResults;
    }

    public function unfold()
    {
        return UIKit::webView(
            "Dice Tower | Fourth Earth",
            UIKit::doubleWrap(
                UIKit::h1("Dice Tower"),
                DiceTower::fold($this->count, $this->showResults)->unfold(),
            )->outer("div")->inner("main"),
            UIKit::script()->attr("src /js/main.js", "type text/javascript")
        )->meta(
            UIKit::script()->attr("src /js/app.js", "type text/javascript")
        );
    }
}

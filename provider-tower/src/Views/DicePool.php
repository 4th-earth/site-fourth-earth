<?php

namespace FourthEarth\Tower\Views;

use Illuminate\View\Component;

use Eightfold\LaravelMarkup\UIKit;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

use FourthEarth\Tower\Views\RollResults;

class DicePool extends Fold
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
        $is = "dice-pool";
        $id = $is ."-". $this->count;
        $roll = $id ."-roll";
        $sides = $id ."-sides";

        $results = UIKit::p("No rolls made");
        if ($this->showResults) {
            $results = RollResults::fold($id)->unfold();
        }

        return UIKit::div(
            UIKit::section(
                UIKit::h2("Main")->attr("contenteditable true"),
                UIKit::select(
                    "Roll",
                    $roll
                )->options(
                    "1 1",
                    "2 2",
                    "3 3",
                    "4 4",
                    "5 5",
                    "6 6",
                    "7 7",
                    "8 8",
                    "9 9",
                    "10 10"
                ),
                UIKit::select(
                    "d",
                    $sides
                )->options(
                    "2 2",
                    "4 4",
                    "6 6",
                    "8 8",
                    "10 10",
                    "12 12",
                    "20 20"
                )
            )->attr("is ". $is, "id ". $id),
            UIKit::aside(
                UIKit::h3("Result for Main"),
                $results
            )->attr("id ". $id ."-results")
        );
    }
}

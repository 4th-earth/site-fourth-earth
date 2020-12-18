<?php

namespace FourthEarth\Tower\Views;

use Illuminate\View\Component;

use Eightfold\Shoop\Shoop;
use Eightfold\LaravelMarkup\UIKit;

use JoshBruce\DiceTower\DicePool as JBDicePool;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

class RollResults extends Fold
{
    private $pool;

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(string $pool)
    {
        $this->pool = $pool;
    }

    public function unfold()
    {
        $separated = Shoop::this(
            request()->all()
        )->each(function($v, $m, &$build) {
            // dump($m);
            // dump($this->pool);
            if (Shoop::this($m)->startsWith($this->pool)->unfold()) {
                // dump("starts with");
                $base = Shoop::this($m);
                $last = $base->divide("-")->last()->efToString();
                $id = $base->divide("-")->dropLast()->efToString("-");
                $build[$id][$last] = $v;
            }

        })->drop(fn($v) => empty($v))->dropLast()->each(function($v) {
            $roll = $v["roll"];
            $side = $v["sides"];
            return "roll". $roll ."d". $side;
        });

        dd($separated);
    //
    //     ->each(function($v, $m, &$build) {
    //         if (Shoop::this($m)->startsWith("dice-pool")->unfold()) {
    //             $roll = $v["roll"];
    //             $side = $v["sides"];
    //             $string = "roll". $roll ."d". $side;
    //             dump($string);
    //             $rolls = JBDicePool::{$string}()->sort(false)->grouped();
    //             $build[$m] = $rolls;
    //         }
    //     })->each(function($v, $m) {
    //         $rolls = Shoop::this($v)->each(function($i, $j) {
    //             $count = Shoop::this($i)->count();
    //             $text = ($count === 1) ? "1 ". $j : $count ." ". $j ."s";
    //             return UIKit::li(
    //                 UIKit::span("rolled ")->attr("class st-only"),
    //                 $text
    //             );
    //         });
    //
    //         return UIKit::ul(...$rolls->unfold());
    //     })->asArray()->first()->unfold();

    }
}

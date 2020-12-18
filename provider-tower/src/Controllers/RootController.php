<?php

namespace FourthEarth\Tower\Controllers;

use App\Http\Controllers\Controller;

use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Tower\Views\Page;

class RootController extends Controller
{
    public function __invoke()
    {
        return Page::fold()->unfold();
    }
}

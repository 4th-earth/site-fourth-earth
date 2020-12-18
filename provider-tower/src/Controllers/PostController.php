<?php

namespace FourthEarth\Tower\Controllers;

use App\Http\Controllers\Controller;

use FourthEarth\Tower\Views\Page;

class PostController extends Controller
{
   public function __invoke()
   {
        $inputs = request()->all();
        $count  = $inputs["count"];
        if (in_array("add", $inputs)) {
            $newCount = $count + 1;
            return Page::fold($newCount)->unfold();
        }
        return Page::fold($count, true)->unfold();
   }
}

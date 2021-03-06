<?php

namespace BirBrand\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use BirBrand\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Cache::remember('categories', config('cache.lifetime'), function () {
            return Category::isShown()->isRoot()->with('children')->get();
        });

        return view('home')->with('categories' , $categories);
    }
}

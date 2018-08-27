<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Home::index();
    }


    public function getHomeRepos()
    {
        return Home::getHomeRepos();
    }

    public function getTopRepos()
    {
        return Item::all();
    }


    public function faker(Request $request)
    {
        return Home::faker($request);
    }


    public function addRepo(Request $request)
    {
        return Home::addRepo($request);

    }
    public function getRepoDetails(Request $request)
    {
        return "dd";
        return Item::getRepoDetails($request);

    }
}

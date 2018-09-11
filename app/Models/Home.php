<?php

namespace App\Models;

use http\Env\Request;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;


class Home extends Model
{
    //

    public static function index()
    {
        $user = Auth::user();
        return $user->createToken('MyApp')-> accessToken;
        $items = Item::all();
        return view('home', ['items' => $items,'nickname'=> Auth::user()->nickname]);

    }


    public static  function authCheck()
    {

        if(Auth::check())
    {

        return view('home');
    }
        $items=Item::all();
        return view('auth.login',['items',$items]);

    }


    public static function getHomeRepos()
    {
        return Item::all();
    }


    public static function faker($request)
    {
        $count=$request->get('count');
        $faker = Faker::create();
        for($i=0;$i < $count;$i++)
        {
            $item=new Item();
            $item->title=$faker->sentence($nbWords = 6, $variableNbWords = true);
            $item->description=$faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $item->summary=$faker->realText($maxNbChars = 200, $indexSize = 2);
        $item->tags=array('PHP','Python');
        $item->stars=666;
        $item->github="http://github.com/arju88nair";
        $item->save();
        }



    }


    public static function addRepo($request)
    {
        $item=new Item();
        $item->title=$request->get('title');
        $item->summary=$request->get('summary');
        $item->description=$request->get('description');
        $item->github=$request->get('github');
        $item->tags=$request->get('tags');
        $item->stars=$request->get('stars');
        $save=$item->save();
        if($save)
        {
            return "Successfully saved";
        }

    }

}

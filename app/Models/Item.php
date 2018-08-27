<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class Item extends \Jenssegers\Mongodb\Eloquent\Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'github','summary','tags','stars'
    ];



    public static function getRepoDetails($request)
    {
        return "fdd";
        $url=$request['url'];
        $client = new Client(); //GuzzleHttp\Client
//        $result = $client->post($url, [
//            'form_params' => [
//                'sample-form-data' => 'value'
//            ]
//        ]);
        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }
}

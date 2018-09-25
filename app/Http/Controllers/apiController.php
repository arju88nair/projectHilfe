<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Home;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class apiController extends Controller
{

    public function getRepoDetails(Request $request)
    {
        $request = parse_url($request['git']);
        $path = $request["path"];
        $parsedDetails = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $path), '/');
        $client = new Client(); //GuzzleHttp\Client        $url='https://api.github.com/repos'.$parsedDetails;
        $url='https://api.github.com/repos'.$parsedDetails;
        $result = $client->get($url);
        if($result->getStatusCode() != 200)
        {
            return array('code'=>500,'message'=>'Wrong URL');
        }
        else{

            return array('code'=>200,'message'=>'Success');

        }
        ;
;



        return Item::getRepoDetails($request);

    }
    public function login(Request $request)
    {
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

}

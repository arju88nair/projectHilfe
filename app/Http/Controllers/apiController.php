<?php

namespace App\Http\Controllers;

use App\Models\Repo;
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
//        $url='https://api.github.com/repos'.$parsedDetails;
        $url = 'https://api.github.com/repos/arju88nair/FuberApi';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Nair'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);
        if (array_key_exists('message', $data)) {
            return response()->json(['message' => 'error'], 401);
        }
        $data=(object)$data;
        $repo= new Repo();
        $repo->title=$data->name;
        $repo->username=$data->owner['login'];
        $repo->avatar_url=$data->owner['avatar_url'];
        $repo->url=$data->html_url;
        $repo->description=$data->description;
        $repo->repo_created_at=$data->created_at;
        $repo->pushed_at=$data->pushed_at;
        $repo->subscribers_count=$data->subscribers_count;
        $repo->language=$data->language;
        $repo->forks=$data->forks;
        $repo->stargazers_count=$data->stargazers_count;
        return $repo->save();


        return response()->json(['message' => $repo], 200);


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

<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class apiController extends Controller
{

    /**
     * @param Request $request
     *
     * API route to insert the repo URL after doing necessary checks for validity or pre-existing
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function getRepoDetails(Request $request)
    {
        $request = parse_url($request['git']);
        $path = $request["path"];
        $parsedDetails = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $path), '/');
        $url='https://api.github.com/repos'.$parsedDetails;
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
            return response()->json(['message' => 'Not a proper repo URL','status'=>Response::$statusTexts['400']], Response::HTTP_BAD_REQUEST);
        }


        $data=(object)$data;

        $repo=Repo::where('repoID', $data->id)->first();
        if($repo)
        {
            return response()->json(['message' => 'Repository already exists','status'=>Response::$statusTexts['400']], Response::HTTP_BAD_REQUEST);

        }


        $repo= new Repo();
        $repo->title=$data->name;
        $repo->repoID=$data->id;
        $repo->username=$data->owner['login'];
        $repo->ownerID=$data->owner['id'];
        $repo->avatar_url=$data->owner['avatar_url'];
        $repo->url=$data->html_url;
        $repo->description=$data->description;
        $repo->repo_created_at=$data->created_at;
        $repo->pushed_at=$data->pushed_at;
        $repo->subscribers_count=$data->subscribers_count;
        $repo->language=$data->language;
        $repo->forks=$data->forks;
        $repo->stargazers_count=$data->stargazers_count;
        $repo->status=1;
        $repo->save();

        return response()->json(['message' => $repo,'status'=>Response::$statusTexts['200']], Response::HTTP_OK);
    }



}

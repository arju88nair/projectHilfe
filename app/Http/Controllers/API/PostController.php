<?php


namespace App\Http\Controllers\API;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Post as PostResource;


class PostController extends BaseController

{

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()

    {

        $products = Post::all();


        return $this->sendResponse(PostResource::collection($products), 'Products retrieved successfully.');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)

    {

        $input = $request->all();


        $validator = Validator::make($input, [

            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'gitSource' => 'required',
            'slug' => 'required',
            'category' => 'required',

        ]);


        if ($validator->fails()) {

            return $this->sendError('Validation Error.', $validator->errors());

        }


        $product = Post::create($input);


        return $this->sendResponse(new PostResource($product), 'Post created successfully.');

    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function show($id)

    {

        $product = Post::find($id);


        if (is_null($product)) {

            return $this->sendError('Post not found.');

        }


        return $this->sendResponse(new PostResource($product), 'Post retrieved successfully.');

    }


    /**
     * @param Request $request
     * @param Post $product
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, Post $product)

    {

        $input = $request->all();


        $validator = Validator::make($input, [

            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'gitSource' => 'required',
            'slug' => 'required',
            'category' => 'required',
        ]);


        if ($validator->fails()) {

            return $this->sendError('Validation Error.', $validator->errors());

        }


        $product->name = $input['name'];

        $product->detail = $input['detail'];

        $product->save();


        return $this->sendResponse(new PostResource($product), 'Post updated successfully.');

    }


    /**
     * @param Post $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function destroy(Post $product)

    {

        $product->delete();


        return $this->sendResponse([], 'Post deleted successfully.');

    }

}
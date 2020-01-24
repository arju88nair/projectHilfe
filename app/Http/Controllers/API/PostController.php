<?php



namespace App\Http\Controllers\API;



use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Models\Product;

use Illuminate\Support\Facades\Validator;

use App\Http\Resources\Post as PostResource;



class PostController extends BaseController

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $Posts = Post::all();



        return $this->sendResponse(PostResource::collection($Posts), 'Posts retrieved successfully.');

    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $input = $request->all();



        $validator = Validator::make($input, [

            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'gitSource' => 'required',

        ]);



        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());

        }



        $Post = Post::create($input);



        return $this->sendResponse(new PostResource($Post), 'Post created successfully.');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $Post = Post::find($id);



        if (is_null($Post)) {

            return $this->sendError('Post not found.');

        }



        return $this->sendResponse(new PostResource($Post), 'Post retrieved successfully.');

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Post $Post)

    {

        $input = $request->all();



        $validator = Validator::make($input, [

            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'gitSource' => 'required',

        ]);



        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());

        }



        $Post->name = $input['name'];

        $Post->detail = $input['detail'];

        $Post->save();



        return $this->sendResponse(new PostResource($Post), 'Post updated successfully.');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Post $Post)

    {

        $Post->delete();



        return $this->sendResponse([], 'Post deleted successfully.');

    }

}



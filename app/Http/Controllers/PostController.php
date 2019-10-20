<?php

namespace App\Http\Controllers;
use App\post;
use App\user;
use App\comment;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::query()->with('user');
        if ($request->has('title')) { 
            $posts=$posts->where('title', 'LIKE', "%$request->title%");
          }
          elseif ($request->has('id'))
        {
        $posts =  $posts->where('user_id', "$request->id");
        }

        return $posts->paginate(5);
        
    }

  
    public function store(Request $request)
    {
        JWTAuth::user()->posts()->create($request->all());
        return 'Post created';

        // $post = new post;
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->user_id=$request->user_id;




        // $post->save();
        // return "post created";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::where('id',$id)->with('media','comments')->get();

    //     //يجيب تعليقات ومن نزل من منشور
    //    //$post = Post::findOrFail($id);

    //   // $test1 =  User::find($post->user_id);
    //    //$test =  comment::where("post_id", $id)->get();
    //    $post = Post::find($id);

    //    return $post->comments ;
    //      //return $test;
    //    // return Post::find($id);

    //    //$post = Post::find($id);

    //   //  $test =  comment::where("post_id", $id)->get();
    }

   
    public function update(Request $request, $id)
    {
            JWTAuth::user()->posts()->findOrFail($id)->update($request->all());
            return 'Post updated';
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return 'Post deleted';
    }
    // public function getcomment($id){
    //     $post = Post::find($id);
    //     return $post->title;
    // }




}

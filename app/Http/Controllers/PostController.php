<?php

namespace App\Http\Controllers;
use App\post;
use App\user;
use App\comment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Post::paginate(10);
        //$posts = post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=$request->user_id;




        $post->save();
        return "";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //يجيب تعليقات ومن نزل من منشور
       //$post = Post::findOrFail($id);

      // $test1 =  User::find($post->user_id);
       //$test =  comment::where("post_id", $id)->get();
       $post = Post::find($id);

       return $post->comments ;
         //return $test;
       // return Post::find($id);

       //$post = Post::find($id);

      //  $test =  comment::where("post_id", $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function getcomment($id){
    //     $post = Post::find($id);
    //     return $post->title;
    // }




}

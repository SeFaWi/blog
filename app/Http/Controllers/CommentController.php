<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\post;

class CommentController extends Controller
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
    public function index()
    {
       
        $comments = comment::query()->with('post');
       

        return $comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
            'post_id' => 'required',
        ]);

    	// $Comment = new Comment();

        // $Comment->user_id = Auth::user()->id;
        // $Comment->post_id = $request->post_id;
        // $Comment->content = $request->content;
        
         $Comment = new Comment;
        $Comment->text=$request->text;
        $Comment->commentable_id=$request->commentable_id;
        $Comment->commentable_type=$request->commentable_type;

        $Comment->save();
        return "done";

        //Comment::create($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return comment::find($id);

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
        $comment = Comment::find($id);

       

        $comment->comment = $request->comment;
        $comment->save();
        return 'comment updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();
        return 'comment deleted';
    }
}

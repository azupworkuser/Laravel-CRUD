<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;


/**
 * Description of CommentController
 *
 * @author Laravel
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Post $post)
    {
        return view('pages.comments.index', [
            'records' => Comment::paginate(10),
            'post' => $post,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @param  Comment $comment
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post, Comment $comment)
    {
        return view('pages.comments.show', [
            'record' => $comment,
            'post' => $post,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Post $post)
    {
        $users = User::all(['id']);
        $posts = Post::all(['id']);

        return view('pages.comments.create', [
            'model' => new Comment,
            'post' => $post,
            "users" => $users,
            "posts" => $posts,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $model = new Comment;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'Comment saved successfully');
            return redirect()->route('comments.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Comment');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @param  Comment $comment
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post, Comment $comment)
    {
        $users = User::all(['id']);
        $posts = Post::all(['id']);

        return view('pages.comments.edit', [
            'model' => $comment,
            'post' => $post,
            "users" => $users,
            "posts" => $posts,

        ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param  Request $request
     * @param  Comment $comment
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $comment->fill($request->all());

        if ($comment->save()) {

            session()->flash('app_message', 'Comment successfully updated');
            return redirect()->route('comments.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Comment');
        }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param  Request $request
     * @param  Comment $comment
     * @param  Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Post $post, Comment $comment)
    {
        if ($comment->delete()) {
            session()->flash('app_message', 'Comment successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Comment');
        }

        return redirect()->back();
    }
}

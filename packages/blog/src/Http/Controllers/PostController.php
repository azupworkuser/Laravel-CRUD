<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Blog\Models\Post;
use Blog\Models\User;
use Blog\Models\Category;


/**
 * Description of PostController
 *
 * @author Laravel
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('blog::pages.posts.index', ['records' => Post::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('blog::pages.posts.show', [
            'record' => $post,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all(['id']);
        $categories = Category::all(['id']);

        return view('blog::pages.posts.create', [
            'model' => new Post,
            "users" => $users,
            "categories" => $categories,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Post;
        $model->fill($request->all());

        if ($request->file('image')->isValid()) {
            $model->image = $request->image->store('image', 'public');
        }

        if ($model->save()) {

            session()->flash('app_message', 'Post saved successfully');
            return redirect()->route('blogposts.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Post');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        $users = User::all(['id']);
        $categories = Category::all(['id']);

        return view('blog::pages.posts.edit', [
            'model' => $post,
            "users" => $users,
            "categories" => $categories,

        ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param  Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->all());

        if ($request->file('image')->isValid()) {
            $post->image = $request->image->store('image', 'public');
        }

        if ($post->save()) {

            session()->flash('app_message', 'Post successfully updated');
            return redirect()->route('blogposts.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Post');
        }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param  Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Post $post)
    {
        if ($post->delete()) {
            session()->flash('app_message', 'Post successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Post');
        }

        return redirect()->back();
    }
}

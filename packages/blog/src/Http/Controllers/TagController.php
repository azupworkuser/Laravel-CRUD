<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Blog\Models\Tag;
use Blog\Http\Requests\Tags\Index;
use Blog\Http\Requests\Tags\Show;
use Blog\Http\Requests\Tags\Create;
use Blog\Http\Requests\Tags\Store;
use Blog\Http\Requests\Tags\Update;
use Blog\Http\Requests\Tags\Destroy;


/**
 * Description of TagController
 *
 * @author Laravel
 */
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Index $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('blog::pages.tags.index', ['records' => Tag::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Show $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Tag $tag)
    {
        return view('blog::pages.tags.show', [
            'record' => $tag,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Create $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('blog::pages.tags.create', [
            'model' => new Tag,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model = new Tag;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'Tag saved successfully');
            return redirect()->route('blog::tags.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Tag');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tag $tag)
    {

        return view('blog::pages.tags.edit', [
            'model' => $tag,

        ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param  Update $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Tag $tag)
    {
        $tag->fill($request->all());

        if ($tag->save()) {

            session()->flash('app_message', 'Tag successfully updated');
            return redirect()->route('blog::tags.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Tag');
        }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Tag $tag)
    {
        if ($tag->delete()) {
            session()->flash('app_message', 'Tag successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Tag');
        }

        return redirect()->back();
    }
}

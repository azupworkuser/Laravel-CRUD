<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Tags\Index;
use App\Http\Requests\Tags\Show;
use App\Http\Requests\Tags\Create;
use App\Http\Requests\Tags\Store;
use App\Http\Requests\Tags\Update;
use App\Http\Requests\Tags\Destroy;


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
        return view('pages.tags.index', ['records' => Tag::paginate(10)]);
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
        return view('pages.tags.show', [
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

        return view('pages.tags.create', [
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
            return redirect()->route('tags.index');
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

        return view('pages.tags.edit', [
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
            return redirect()->route('tags.index');
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

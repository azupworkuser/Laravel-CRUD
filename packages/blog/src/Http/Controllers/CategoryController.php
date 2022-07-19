<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Blog\Models\Category;
use Blog\Http\Requests\Categories\Index;
use Blog\Http\Requests\Categories\Show;
use Blog\Http\Requests\Categories\Create;
use Blog\Http\Requests\Categories\Store;
use Blog\Http\Requests\Categories\Update;
use Blog\Http\Requests\Categories\Destroy;


/**
 * Description of CategoryController
 *
 * @author Laravel
 */

class CategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('blog::pages.categories.index', ['records' => Category::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Category $category)
    {
        return view('blog::pages.categories.show', [
                'record' =>$category,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('blog::pages.categories.create', [
            'model' => new Category,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Category;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Category saved successfully');
            return redirect()->route('blog::categories.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Category');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {

        return view('blog::pages.categories.edit', [
            'model' => $category,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Category $category)
    {
        $category->fill($request->all());

        if ($category->save()) {
            
            session()->flash('app_message', 'Category successfully updated');
            return redirect()->route('blog::categories.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Category');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Category $category)
    {
        if ($category->delete()) {
                session()->flash('app_message', 'Category successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Category');
            }

        return redirect()->back();
    }
}

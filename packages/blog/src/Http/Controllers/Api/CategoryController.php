<?php

namespace Blog\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Blog\Models\Category;
use Blog\Transformers\CategoryTransformer;
use Blog\Http\Requests\Api\Categories\Index;
use Blog\Http\Requests\Api\Categories\Show;
use Blog\Http\Requests\Api\Categories\Store;
use Blog\Http\Requests\Api\Categories\Update;
use Blog\Http\Requests\Api\Categories\Destroy;


/**
 * Category
 *
 * @Resource("Category", uri="/categories")
 */

class CategoryController extends ApiController
{
        /**
     * List of Category
     *
     * @Get("/")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("page", description="The page of results to view.", type="integer", default=1)
     * })
     * @Response(200, body={
       "data": {{{}}}
    })
     */
    public function index(Index $request)
    {
       return $this->response->paginator(Category::paginate(10), new CategoryTransformer());
    }
     /**
     * Show details about a Category
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Category",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [Blog\Models\Category]."})
     * })
     */
    public function show(Show $request, $category)
    {
      $category = Category::findOrFail($category);
      return $this->response->item($category, new CategoryTransformer());
    }
    /**
     * Create a Category
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "parent_id": "nullable|max:255",
    "title": "nullable|max:255",
    "slug": "required|unique:categories,slug|max:255"
}),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Category"})
     * })
     */
    public function store(Store $request)
    {
        $model=new Category;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new CategoryTransformer());
        } else {
              return $this->response->errorInternal('Error occurred while saving Category');
        }
    }
    /**
     * Update a existing Category
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Category", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "parent_id": "nullable|max:255",
    "title": "nullable|max:255",
    "slug": "required|unique:categories,slug|max:255"
}),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [Blog\Models\Category]."})
     * })
     */
    public function update(Update $request, $category)
    {
        $category = Category::findOrFail($category);
        $category->fill($request->all());

        if ($category->save()) {
            return $this->response->item($category, new CategoryTransformer());
        } else {
             return $this->response->errorInternal('Error occurred while saving Category');
        }
    }
    /**
     * Delete an existing Category
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Category",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Category successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [Blog\Models\Category]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Category"})
     * })
     */
    public function destroy(Destroy $request, $category)
    {
        $category = Category::findOrFail($category);

        if ($category->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Category successfully deleted']);
        } else {
             return $this->response->errorInternal('Error occurred while deleting Category');
        }
    }

}

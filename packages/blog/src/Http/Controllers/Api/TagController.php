<?php

namespace Blog\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Blog\Models\Tag;
use Blog\Transformers\TagTransformer;
use Blog\Http\Requests\Api\Tags\Index;
use Blog\Http\Requests\Api\Tags\Show;
use Blog\Http\Requests\Api\Tags\Store;
use Blog\Http\Requests\Api\Tags\Update;
use Blog\Http\Requests\Api\Tags\Destroy;


/**
 * Tag
 *
 * @Resource("Tag", uri="/tags")
 */
class TagController extends ApiController
{
    /**
     * List of Tag
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
        return $this->response->paginator(Tag::paginate(10), new TagTransformer());
    }

    /**
     * Show details about a Tag
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Tag",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [Blog\Models\Tag]."})
     * })
     */
    public function show(Show $request, $tag)
    {
        $tag = Tag::findOrFail($tag);
        return $this->response->item($tag, new TagTransformer());
    }

    /**
     * Create a Tag
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "slug": "required|max:255",
    "name": "nullable|max:150"
    }),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Tag"})
     * })
     */
    public function store(Store $request)
    {
        $model = new Tag;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new TagTransformer());
        } else {
            return $this->response->errorInternal('Error occurred while saving Tag');
        }
    }

    /**
     * Update a existing Tag
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Tag", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "slug": "required|max:255",
    "name": "nullable|max:150"
    }),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [Blog\Models\Tag]."})
     * })
     */
    public function update(Update $request, $tag)
    {
        $tag = Tag::findOrFail($tag);
        $tag->fill($request->all());

        if ($tag->save()) {
            return $this->response->item($tag, new TagTransformer());
        } else {
            return $this->response->errorInternal('Error occurred while saving Tag');
        }
    }

    /**
     * Delete an existing Tag
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Tag",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Tag successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [Blog\Models\Tag]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Tag"})
     * })
     */
    public function destroy(Destroy $request, $tag)
    {
        $tag = Tag::findOrFail($tag);

        if ($tag->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Tag successfully deleted']);
        } else {
            return $this->response->errorInternal('Error occurred while deleting Tag');
        }
    }

}

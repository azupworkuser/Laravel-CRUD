<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use App\Transformers\PostTransformer;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\Api\Posts\Index;
use App\Http\Requests\Api\Posts\Show;
use App\Http\Requests\Api\Posts\Store;
use App\Http\Requests\Api\Posts\Update;
use App\Http\Requests\Api\Posts\Destroy;


/**
 * Post
 *
 * @Resource("Post", uri="/posts")
 */
class PostController extends ApiController
{
    /**
     * List of Post
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
        return $this->response->paginator(Post::paginate(10), new PostTransformer());
    }

    /**
     * Show details about a Post
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Post",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "data": {{}}
     *         }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Post]."})
     * })
     */
    public function show(Show $request, $post)
    {
        $post = Post::findOrFail($post);
        return $this->response->item($post, new PostTransformer());
    }

    /**
     * Create a Post
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({
    "user_id": "required|exists:users,id|numeric",
    "title": "nullable|max:255",
    "slug": "nullable|unique:posts,slug|max:255",
    "status": "required|in:draft,published,canceled",
    "body": "nullable|string",
    "category_id": "nullable|exists:categories,id|numeric",
    "image": "nullable|file",
    "published_at": "nullable|date",
    "total_view": "required|numeric"
    }),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Post"})
     * })
     */
    public function store(Store $request)
    {
        $model = new Post;
        $model->fill($request->all());

        if ($model->save()) {
            return $this->response->item($model, new PostTransformer());
        } else {
            return $this->response->errorInternal('Error occurred while saving Post');
        }
    }

    /**
     * Update a existing Post
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Post", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "user_id": "required|exists:users,id|numeric",
    "title": "nullable|max:255",
    "slug": "nullable|unique:posts,slug|max:255",
    "status": "required|in:draft,published,canceled",
    "body": "nullable|string",
    "category_id": "nullable|exists:categories,id|numeric",
    "image": "nullable|file",
    "published_at": "nullable|date",
    "total_view": "required|numeric"
    }),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [App\Models\Post]."})
     * })
     */
    public function update(Update $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->fill($request->all());

        if ($post->save()) {
            return $this->response->item($post, new PostTransformer());
        } else {
            return $this->response->errorInternal('Error occurred while saving Post');
        }
    }

    /**
     * Delete an existing Post
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="The primary key of Post",type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Post successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [App\Models\Post]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Post"})
     * })
     */
    public function destroy(Destroy $request, $post)
    {
        $post = Post::findOrFail($post);

        if ($post->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Post successfully deleted']);
        } else {
            return $this->response->errorInternal('Error occurred while deleting Post');
        }
    }

}

<?php

namespace Blog\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Blog\Models\Comment;
use Blog\Models\Post;
use Blog\Transformers\CommentTransformer;
use Blog\Models\User;
use Blog\Http\Requests\Api\Comments\Index;
use Blog\Http\Requests\Api\Comments\Show;
use Blog\Http\Requests\Api\Comments\Store;
use Blog\Http\Requests\Api\Comments\Update;
use Blog\Http\Requests\Api\Comments\Destroy;


/**
 * Comment
 *
 * @Resource("Comment", uri="/comments/{post}")
 */
class CommentController extends ApiController
{
    /**
     * List of Comment
     *
     * @Get("/")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("post", description="The primary key of post", type="integer", required=true),
     *      @Parameter("page", description="The page of results to view.", type="integer", default=1)
     * })
     * @Response(200, body={
    "data": {}
    })
     */
    public function index(Index $request, $post)
    {
        return $this->response->paginator(Comment::paginate(10), new CommentTransformer());
    }

    /**
     * Show details about a Comment
     *
     * @Get("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("post", description="The primary key of post", type="integer", required=true),
     *      @Parameter("id", description="The primary key of Comment", type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
    "data": {}
    }),
     *      @Response(404, body={"message": "No query results for model [Blog\Models\Comment]."})
     * })
     */
    public function show(Show $request, $post, $comment)
    {
        $comment = Comment::findOrFail($comment);
        return $this->response->item($comment, new CommentTransformer());
    }

    /**
     * Create a Comment
     *
     *
     * @Post("/store")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("post", description="The primary key of post", type="integer", required=true)
     * })
     * @Transaction({
     *      @Request({
    "user_id": "required|exists:users,id|numeric",
    "post_id": "required|exists:posts,id|numeric",
    "body": "nullable|string"
    }),
     *      @Response(200, body={}),
     *      @Response(500, body={"message": "Error occurred while saving Comment"})
     * })
     */
    public function store(Store $request, $post)
    {
        $model = new Comment;
        $model->fill($request->all());

        if ($model->save()) {
            session()->flash('app_message', 'Comment saved successfully');
            return $this->response->item($model, new CommentTransformer());
        } else {
            return $this->response->errorInternal('Error occurred while saving Comment');
        }
    }

    /**
     * Update a existing Comment
     *
     * @Put("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("post", description="The primary key of post", type="integer", required=true),
     *      @Parameter("id", description="The primary key of Comment", type="integer", required=true)
     * })
     * @Transaction({
     *     @Request({
    "user_id": "required|exists:users,id|numeric",
    "post_id": "required|exists:posts,id|numeric",
    "body": "nullable|string"
    }),
     *     @Response(200, body={}),
     *     @Response(404, body={"message": "No query results for model [Blog\Models\Comment]."})
     * })
     */
    public function update(Update $request, $post, $comment)
    {
        $comment = Comment::findOrFail($comment);
        $comment->fill($request->all());

        if ($comment->save()) {
            return $this->response->item($comment, new CommentTransformer());
        } else {
            return $this->response->errorInternal('Error occurred while saving Comment');
        }
    }

    /**
     * Delete an existing Comment
     *
     * @Delete("/{id}")
     *
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("post", description="The primary key of post", type="integer", required=true),
     *      @Parameter("id", description="The primary key of Comment", type="integer", required=true)
     * })
     * @Transaction({
     *      @Response(200, body={
     *           "status": 200,
     *           "message": "Comment successfully deleted"
     *       }),
     *      @Response(404, body={"message": "No query results for model [Blog\Models\Comment]."}),
     *      @Response(500, body={"message": "Error occurred while deleting Comment"})
     * })
     */
    public function destroy(Destroy $request, $post, $comment)
    {
        $comment = Comment::findOrFail($comment);

        if ($comment->delete()) {
            return $this->response->array(['status' => 200, 'message' => 'Comment successfully deleted']);
        } else {
            return $this->response->errorInternal('Error occurred while deleting Comment');
        }
    }

}

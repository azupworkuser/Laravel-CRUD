<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Post;

class PostTransformer extends TransformerAbstract
{
    public function __construct()
    {

    }

    /**
     * @var array
     */
    private $validParams = ['q', 'limit', 'page'];

    /**
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * @var array
     */
    protected $defaultIncludes = [];


    public function transform(Post $post)
    {
        return [
            "id" => $post->id,
            "user_id" => $post->user_id,
            "title" => $post->title,
            "slug" => $post->slug,
            "status" => $post->status,
            "body" => $post->body,
            "category_id" => $post->category_id,
            "image" => $post->image,
            "published_at" => $post->published_at,
            "total_view" => $post->total_view,
            "created_at" => $post->created_at,
            "updated_at" => $post->updated_at,

        ];

    }
}
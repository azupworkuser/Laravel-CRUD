<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Category;

class CategoryTransformer extends TransformerAbstract
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


    public function transform(Category $category)
    {
        return [
			"id" => $category->id,
			"parent_id" => $category->parent_id,
			"title" => $category->title,
			"slug" => $category->slug,
			"created_at" => $category->created_at,
			"updated_at" => $category->updated_at,

        ];

    }
}
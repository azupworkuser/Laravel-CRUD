<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property varchar $slug slug
 * @property varchar $name name
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property \Illuminate\Database\Eloquent\Collection $post belongsToMany
 */
class Tag extends Model
{

    /**
     * Database table name
     */
    protected $table = 'tags';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['slug', 'name'];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }


}
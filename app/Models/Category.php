<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $parent_id parent id
@property varchar $title title
@property varchar $slug slug
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property \Illuminate\Database\Eloquent\Collection $post hasMany
   
 */
class Category extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'categories';

    /**
    * Mass assignable columns
    */
    protected $fillable=['parent_id','title','slug'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * posts
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function posts()
    {
        return $this->hasMany(Post::class,'category_id');
    }



}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id user id
 * @property varchar $title title
 * @property varchar $slug slug
 * @property enum $status status
 * @property longtext $body body
 * @property int $category_id category id
 * @property varchar $image image
 * @property datetime $published_at published at
 * @property int $total_view total view
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property Category $category belongsTo
 * @property User $user belongsTo
 * @property \Illuminate\Database\Eloquent\Collection $comment hasMany
 * @property \Illuminate\Database\Eloquent\Collection $tag belongsToMany
 */
class FullPost extends Model
{
    const STATUS_DRAFT = 'draft';

    const STATUS_PUBLISHED = 'published';

    const STATUS_CANCELED = 'canceled';

    /**
     * Database table name
     */
    protected $table = 'posts';

    /**
     * Mass assignable columns
     */
    protected $fillable = ['user_id', 'title', 'slug', 'status', 'body', 'category_id', 'image', 'published_at', 'total_view'];
    /**
     * casts
     */
    protected $casts = ['user_id' => 'int', 'title' => 'string', 'slug' => 'string', 'status' => 'string', 'category_id' => 'int', 'image' => 'string', 'total_view' => 'int'];
    /**
     * Date time columns.
     */
    protected $dates = ['published_at'];

    /**
     * category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    /**
     * tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    /**
     * title column mutator.
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = htmlspecialchars($value);
    }

    /**
     * slug column mutator.
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = htmlspecialchars($value);
    }

    /**
     * image column mutator.
     */
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = htmlspecialchars($value);
    }

    /**
     * published_at column mutator. Date will be converted automatically to db format before saving.
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    /**
     * published_at column accessor. Date will be converted to human readable format before display
     */
    public function getPublishedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('m/d/Y h:i A');
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $title
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTitle($query, $title)
    {
        return $query->where('title', $title);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $body
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBody($query, $body)
    {
        return $query->where('body', $body);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $category_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoryId($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $image
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeImage($query, $image)
    {
        return $query->where('image', $image);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $published_at
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublishedAt($query, $published_at)
    {
        return $query->where('published_at', $published_at);
    }

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $total_view
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTotalView($query, $total_view)
    {
        return $query->where('total_view', $total_view);
    }

    /**
     * Table wise search
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $q
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeQ($query, $q)
    {
        return $query->where(function ($sq) use ($q) {
            $sq->orWhere('total_view', $q)
                ->orWhere('image', 'LIKE', '%' . $q . '%')
                ->orWhere('slug', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%');
        });
    }
}
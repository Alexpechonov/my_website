<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'title', 'description', 'body',
    ];

    public function setUserIdAttribute($value)
    {
        $this->attributes['author_id'] = $value;
    }

    /**
     * Get the owner for a post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function owner()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Returns all groups for a post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'posts_to_groups', 'post_id', 'group_id');
    }
}

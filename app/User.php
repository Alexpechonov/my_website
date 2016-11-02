<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'group_id', 'policy_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get user's group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get user's references
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    /**
     * Get user's posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Get user's policy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Policy::class, 'policy_id');
    }

    /**
     * Check if user has a role
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role = 'admin') {
        switch ($role) {
            case "admin":
                return $this->isAdmin();
            case "student":
                return $this->isStudent();
            case "teacher":
                return $this->isTeacher();
            default:
                return false;
        }
    }

    /**
     * Check if user is admin
     *
     * @return bool
     */
    public function isAdmin() {
        return $this->role->id == 1;
    }

    /**
     * Check if user is student
     *
     * @return boolean
     */
    public function isStudent()
    {
        return $this->role->id == 2;
    }

    /**
     * Check if user is teacher
     *
     * @return boolean
     */
    public function isTeacher()
    {
        return $this->role->id == 3;
    }
}

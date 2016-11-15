<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Indexes for roles in the DB table.
     */
    const ADMIN = 1;
    const STUDENT = 2;
    const TEACHER = 3;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'group_id', 'policy_id',
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
     * Get user's group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get user's references.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    /**
     * Get user's posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Get user's policy.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Policy::class, 'policy_id');
    }

    /**
     * Check if user has a role.
     *
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role = 'admin')
    {
        switch ($role) {
            case 'admin':
                return $this->isAdmin();
            case 'student':
                return $this->isStudent();
            case 'teacher':
                return $this->isTeacher();
            default:
                return false;
        }
    }

    /**
     * Check if user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->id == 1;
    }

    /**
     * Check if user is student.
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->role->id == self::STUDENT;
    }

    /**
     * Check if user is teacher.
     *
     * @return bool
     */
    public function isTeacher()
    {
        return $this->role->id == self::TEACHER;
    }

    /**
     * Scope a query to only include teachers.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeTeachers($query)
    {
        return $query->where('policy_id', self::TEACHER);
    }

    /**
     * Scope a query to only include students.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeStudents($query)
    {
        return $query->where('policy_id', self::STUDENT);
    }
}

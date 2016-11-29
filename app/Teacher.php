<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id_api', 'firstName', 'middleName', 'lastName', 'department', 'rank',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
     protected $table = 'faculties';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
}

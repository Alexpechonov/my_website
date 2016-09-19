<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    public $table = 'policies';

    protected $fillable = [
        'name'
    ];

}

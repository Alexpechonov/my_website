<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    public $table = 'policies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the owner for a policy.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function owner(){
        return $this->belongsTo(User::class);
    }

}

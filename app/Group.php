<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'speciality_id', 'faculty_id'
    ];

    /**
     * Get the number of group
     *
     * @return mixed
     */
    public function getNumber(){
        return $this->number;
    }

    /**
     * Get the object of speciality
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    /**
     * Get the object of faculty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}

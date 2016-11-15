<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'faculty_id',
    ];

    /**
     * Get the name of speciality.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the description of speciality.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the object of faculty.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}

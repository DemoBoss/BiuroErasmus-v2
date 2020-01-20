<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyYear extends Model
{
    protected $fillable = [
        'name', 'specialization_id'
    ];
}

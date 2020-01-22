<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{

    protected $fillable = [
        'nazwa_siatki',
        'year_id',
        'specialization_id',
        'stacjonarne',
        'inzynierskie',
    ];
}

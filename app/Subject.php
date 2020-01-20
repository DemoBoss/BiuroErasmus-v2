<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'przedmiot', 'grid_id', 'godziny', 'ECTS','nauczyciel', 'jezyk', 'semestr',
    ];
}

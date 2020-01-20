<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedItem extends Model
{
    protected $fillable = [
        'id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia',
        'Wykład1','Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1',
        'Wykład2','Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2',  'rok1',
        'Wykład3','Cw_Konw_Lab_3', 'ECTS_s3', 'semestr_3',
        'Wykład4','Cw_Konw_Lab_4', 'ECTS_s4', 'semestr_4',  'rok2',
        'Wykład5','Cw_Konw_Lab_5', 'ECTS_s5', 'semestr_5',
        'Wykład6','Cw_Konw_Lab_6', 'ECTS_s6', 'semestr_6',  'rok3',
        'Wykład7','Cw_Konw_Lab_7', 'ECTS_s7', 'semestr_7',  'rok4',
        'stacjonarne',
        'niestacjonarne',
        'inzynierskie',
          'magisterskie',
        'rok',

    ];
}

<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class TeacherController extends Controller
{
    public function index()
    {

        $teachers = Teacher::all();
        $students = User::all();

        return view('prowadzacy.prowadzacy')->with(compact('teachers', 'students'));
    }

    public function tworzenie_siatki(Request $request){
        {
            $nazwa_siatki = $request->input('nazwa_siatki');


            Grid::create([
                'nazwa_siatki' => $nazwa_siatki,
            ]);
            $komunikat = "Siatka została dodany pomyślnie.";


            // Przekierowanie do /przedmiotow
            return back()->with(compact('komunikat'));


        }

    }
    public static function showTeacher($id){
        $teacher_id = $id;
        $teacher = Teacher::where('id',$teacher_id)->first();
        return view('prowadzacy.nauczyciel')->with(compact('teacher','teacher_id'));

    }

    public static function dodaj_prowadzacego(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $language = $request->input('language');



        Teacher::insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'language' => $language,

        ]);
        $komunikat = "Prowadzący dodany pomyślnie.";


        // Przekierowanie do /prowadzacy
        return back()->with(compact('komunikat'));


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

}

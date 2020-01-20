<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function index()
    {

        $students = User::where('role_name', 'student')->get();

        return view('studenci.studenci')->with(compact('students'));
    }


    //public function create()
    //  {
    //      return view('siatki.create');
    //  }

    public function tworzenie_siatki(Request $request){
        {
            $nazwa_siatki = $request->input('nazwa_siatki');


            Grid::create([
                'nazwa_siatki' => $nazwa_siatki,
            ]);
            $komunikat = "Siatka została dodany pomyślnie.";


            // Przekierowanie do /posty
            return back()->with(compact('komunikat'));


        }


    }
    public static function showStudent($id){
        $student_id = $id;
        $student = User::where('id',$student_id)->first();
        return view('studenci.student')->with(compact('student','student_id'));

    }

    public static function tworzenie_przedmiotu(Request $request){

        $nazwa_przedmiotu = $request->input('nazwa_przedmiotu');
        $grid_id = $request->input('grid_id');
        $godziny = $request->input('godziny');
        $ECTS = $request->input('ECTS');
        $prowadzacy = $request->input('nauczyciel');
        $jezyk = $request->input('jezyk');
        $semestr = $request->input('semestr');


        Subject::create([
            'nazwa_przedmiotu' => $nazwa_przedmiotu,
            'grid_id' => $grid_id,
            'godziny' => $godziny,
            'ECTS' => $ECTS,
            'prowadzacy' => $prowadzacy,
            'jezyk' => $jezyk,
            'semestr' => $semestr,
        ]);
        $komunikat = "Przedmiot została dodany pomyślnie.";


        // Przekierowanie do /posty
        return back()->with(compact('komunikat', 'grid_id'));


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function import2(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        $grid_id = $request->input('grid_id');

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {

                $insert_data[] = array(
                    'nazwa_przedmiotu'  => $value['name'],
                    'godziny'   => $value['godziny'],
                    'ECTS'   => $value['ects'],
                    'nauczyciel' => $value['teacher'],
                    'jezyk'  => $value['jezyk'],
                    'semestr'   => $value['semestr'],
                    'grid_id'  => $grid_id,
                );

            }

            if(!empty($insert_data))
            {
                DB::table('Subjects')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}

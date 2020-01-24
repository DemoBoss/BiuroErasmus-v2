<?php

namespace App\Http\Controllers;

use App\Grid;
use App\StudyYear;
use App\Subject;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exceptions\Handler;


class SiatkiController extends Controller
{
    public function index()
    {

        $grids = Grid::All();

        return view('siatki.siatki')->with(compact('grids'));
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
    public static function showGrid($id){

        $grid_id = $id;
        $subjects = Subject::where('grid_id',$id)->orderBy('nazwa_przedmiotu', 'ASC')->get();
        return view('siatki.siatka')->with(compact('subjects', 'grid_id'));

    }

//    public static function tworzenie_przedmiotu(Request $request){
//
//        $nazwa_przedmiotu = $request->input('nazwa_przedmiotu');
//        $grid_id = $request->input('grid_id');
//        $godziny = $request->input('godziny');
//        $ECTS = $request->input('ECTS');
//        $prowadzacy = $request->input('nauczyciel');
//        $jezyk = $request->input('jezyk');
//        $semestr = $request->input('semestr');
//
//
//        Subject::insert([
//            'nazwa_przedmiotu' => $nazwa_przedmiotu,
//
//            'Przedmioty'  => $row['przedmiot'],
//            'Forma_zaliczenia'   => $row['forma_zaliczenia'],
//            'Wykład1'   => $row['wyklad1'],
//            'Cw_Konw_Lab_1' => $row['cw_konw_lab_s1'],
//            'ECTS_s1'  => $row['ects_s1'],
//            'semestr_1'   => $row['semestr_1'],
//            'Wykład2'   => $row['wyklad2'],
//            'Cw_Konw_Lab_2' => $row['cw_konw_lab_s2'],
//            'ECTS_s2'  => $row['ects_s2'],
//            'semestr_2'   => $row['semestr_2'],
//            'rok1'   => $row['rok_1'],
//            'Wykład3'   => $row['wyklad3'],
//            'Cw_Konw_Lab_3' => $row['cw_konw_lab_s3'],
//            'ECTS_s3'  => $row['ects_s3'],
//            'semestr_3'   => $row['semestr_3'],
//            'Wykład4'   => $row['wyklad4'],
//            'Cw_Konw_Lab_4' => $row['cw_konw_lab_s4'],
//            'ECTS_s4'  => $row['ects_s4'],
//            'semestr_4'   => $row['semestr_4'],
//            'rok2'   => $row['rok_2'],
//            'Wykład5'   => $row['wyklad5'],
//            'Cw_Konw_Lab_5' => $row['cw_konw_lab_s5'],
//            'ECTS_s5'  => $row['ects_s5'],
//            'semestr_5'   => $row['semestr_5'],
//            'Wykład6'   => $row['wyklad6'],
//            'Cw_Konw_Lab_6' => $row['cw_konw_lab_s6'],
//            'ECTS_s6'  => $row['ects_s6'],
//            'semestr_6'   => $row['semestr_6'],
//            'rok3'   => $row['rok_3'],
//            'Wykład7'   => $row['wyklad7'],
//            'Cw_Konw_Lab_7' => $row['cw_konw_lab_s7'],
//            'ECTS_s7'  => $row['ects_s7'],
//            'semestr_7'   => $row['semestr_7'],
//            'rok4'   => $row['rok_4'],
//            'grid_id'  => $grid->id,
//            'Nazwa_pliku' => $nazwaPliku,
//        ]);
//        $komunikat = "Przedmiot została dodany pomyślnie.";
//
//
//        // Przekierowanie do /posty
//        return back()->with(compact('komunikat', 'grid_id'));
//
//
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function importInz(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $year_id = $request->input('year_id');
        $kierunek_id = $request->input('kierunek_id');
        $inzynierskie = $request->input('inzynierskie');
        $stacjonarne = $request->input('stacjonarne');
        $nazwaPliku = $request->file('select_file')->getClientOriginalName();


        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();
        $rok = StudyYear::where('id', $year_id)->first();

        $year = substr($rok->name, 0, 4);

        $existing_grid = Grid::where('nazwa_siatki', (int)$year)->
            where('year_id', $year_id)->
            where('stacjonarne', $stacjonarne)->
            where('inzynierskie', $inzynierskie)->first();

        if(is_null($existing_grid)) {
            Grid::create([
                'nazwa_siatki' => (int)$year,
                'year_id' => $year_id,
                'specialization_id' => $kierunek_id,
                'stacjonarne' => $stacjonarne,
                'inzynierskie' => $inzynierskie
            ]);
        }




        $grid = Grid::where ('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', $stacjonarne)
            ->where('inzynierskie', $inzynierskie)->first();



        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'Przedmioty'  => $row['przedmiot'],
                        'Forma_zaliczenia'   => $row['forma_zaliczenia'],
                        'Wykład1'   => $row['wyklad1'],
                        'Cw_Konw_Lab_1' => $row['cw_konw_lab_s1'],
                        'ECTS_s1'  => $row['ects_s1'],
                        'semestr_1'   => $row['semestr_1'],
                        'Wykład2'   => $row['wyklad2'],
                        'Cw_Konw_Lab_2' => $row['cw_konw_lab_s2'],
                        'ECTS_s2'  => $row['ects_s2'],
                        'semestr_2'   => $row['semestr_2'],
                        'rok1'   => $row['rok_1'],
                        'Wykład3'   => $row['wyklad3'],
                        'Cw_Konw_Lab_3' => $row['cw_konw_lab_s3'],
                        'ECTS_s3'  => $row['ects_s3'],
                        'semestr_3'   => $row['semestr_3'],
                        'Wykład4'   => $row['wyklad4'],
                        'Cw_Konw_Lab_4' => $row['cw_konw_lab_s4'],
                        'ECTS_s4'  => $row['ects_s4'],
                        'semestr_4'   => $row['semestr_4'],
                        'rok2'   => $row['rok_2'],
                        'Wykład5'   => $row['wyklad5'],
                        'Cw_Konw_Lab_5' => $row['cw_konw_lab_s5'],
                        'ECTS_s5'  => $row['ects_s5'],
                        'semestr_5'   => $row['semestr_5'],
                       'Wykład6'   => $row['wyklad6'],
                        'Cw_Konw_Lab_6' => $row['cw_konw_lab_s6'],
                        'ECTS_s6'  => $row['ects_s6'],
                        'semestr_6'   => $row['semestr_6'],
                        'rok3'   => $row['rok_3'],
                        'Wykład7'   => $row['wyklad7'],
                        'Cw_Konw_Lab_7' => $row['cw_konw_lab_s7'],
                        'ECTS_s7'  => $row['ects_s7'],
                        'semestr_7'   => $row['semestr_7'],
                        'rok4'   => $row['rok_4'],
                        'grid_id'  => $grid->id,
                        'Nazwa_pliku' => $nazwaPliku,

                    );
                }
            }


            if(!empty($insert_data))
            {
                DB::table('subjects')->insert($insert_data);

            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }


    function importInzNS(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $year_id = $request->input('year_id');
        $kierunek_id = $request->input('kierunek_id');
        $inzynierskie = $request->input('inzynierskie');
        $stacjonarne = $request->input('stacjonarne');
        $nazwaPliku = $request->file('select_file')->getClientOriginalName();


        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();
        $rok = StudyYear::where('id', $year_id)->first();

        $year = substr($rok->name, 0, 4);

        $existing_grid = Grid::where('nazwa_siatki', (int)$year)->
            where('year_id', $year_id)->
            where('stacjonarne', $stacjonarne)->
            where('inzynierskie', $inzynierskie)->first();

        if(is_null($existing_grid)) {
            Grid::create([
                'nazwa_siatki' => (int)$year,
                'year_id' => $year_id,
                'specialization_id' => $kierunek_id,
                'stacjonarne' => $stacjonarne,
                'inzynierskie' => $inzynierskie
            ]);
        }




        $grid = Grid::where ('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', $stacjonarne)
            ->where('inzynierskie', $inzynierskie)->first();



        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'Przedmioty'  => $row['przedmiot'],
                        'Forma_zaliczenia'   => $row['forma_zaliczenia'],
                        'Wykład1'   => $row['wyklad1'],
                        'Cw_Konw_Lab_1' => $row['cw_konw_lab_1'],
                        'ECTS_s1'  => $row['ects_s1'],
                        'semestr_1'   => $row['semestr_1'],
                        'Wykład2'   => $row['wyklad2'],
                        'Cw_Konw_Lab_2' => $row['cw_konw_lab_2'],
                        'ECTS_s2'  => $row['ects_s2'],
                        'semestr_2'   => $row['semestr_2'],
                        'rok1'   => $row['rok_1'],
                        'Wykład3'   => $row['wyklad3'],
                        'Cw_Konw_Lab_3' => $row['cw_konw_lab_3'],
                        'ECTS_s3'  => $row['ects_s3'],
                        'semestr_3'   => $row['semestr_3'],
                        'Wykład4'   => $row['wyklad4'],
                        'Cw_Konw_Lab_4' => $row['cw_konw_lab_4'],
                        'ECTS_s4'  => $row['ects_s4'],
                        'semestr_4'   => $row['semestr_4'],
                        'rok2'   => $row['rok_2'],
                        'Wykład5'   => $row['wyklad5'],
                        'Cw_Konw_Lab_5' => $row['cw_konw_lab_5'],
                        'ECTS_s5'  => $row['ects_s5'],
                        'semestr_5'   => $row['semestr_5'],
                       'Wykład6'   => $row['wyklad6'],
                        'Cw_Konw_Lab_6' => $row['cw_konw_lab_6'],
                        'ECTS_s6'  => $row['ects_s6'],
                        'semestr_6'   => $row['semestr_6'],
                        'rok3'   => $row['rok_3'],
                        'Wykład7'   => $row['wyklad7'],
                        'Cw_Konw_Lab_7' => $row['cw_konw_lab_7'],
                        'ECTS_s7'  => $row['ects_s7'],
                        'semestr_7'   => $row['semestr_7'],
                        'rok4'   => $row['rok_4'],
                        'grid_id'  => $grid->id,
                        'Nazwa_pliku' => $nazwaPliku,

                    );
                }
            }


            if(!empty($insert_data))
            {
                DB::table('subjects')->insert($insert_data);

            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }


    function importMgr(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $year_id = $request->input('year_id');
        $kierunek_id = $request->input('kierunek_id');
        $inzynierskie = $request->input('inzynierskie');
        $stacjonarne = $request->input('stacjonarne');
        $nazwaPliku = $request->file('select_file')->getClientOriginalName();


        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();
        $rok = StudyYear::where('id', $year_id)->first();

        $year = substr($rok->name, 0, 4);

        $existing_grid = Grid::where('nazwa_siatki', (int)$year)->
            where('year_id', $year_id)->
            where('stacjonarne', $stacjonarne)->
            where('inzynierskie', $inzynierskie)->first();

        if(is_null($existing_grid)) {
            Grid::create([
                'nazwa_siatki' => (int)$year,
                'year_id' => $year_id,
                'specialization_id' => $kierunek_id,
                'stacjonarne' => $stacjonarne,
                'inzynierskie' => $inzynierskie
            ]);
        }




        $grid = Grid::where ('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', $stacjonarne)
            ->where('inzynierskie', $inzynierskie)->first();



    if($data->count() > 0)
    {
        foreach($data->toArray() as $key => $value)
        {
            foreach($value as $row)
            {
                $insert_data[] = array(
                    'Przedmioty'  => $row['przedmiot'],
                    'Forma_zaliczenia'   => $row['forma_zaliczenia'],
                    'Wykład1'   => $row['wyklad1'],
                    'Cw_Konw_Lab_1' => $row['cw_konw_lab_s1'],
                    'ECTS_s1'  => $row['ects_s1'],
                    'semestr_1'   => $row['semestr_1'],
                    'Wykład2'   => $row['wyklad2'],
                    'Cw_Konw_Lab_2' => $row['cw_konw_lab_s2'],
                    'ECTS_s2'  => $row['ects_s2'],
                    'semestr_2'   => $row['semestr_2'],
                    'rok1'   => $row['rok_1'],
                    'Wykład3'   => $row['wyklad3'],
                    'Cw_Konw_Lab_3' => $row['cw_konw_lab_s3'],
                    'ECTS_s3'  => $row['ects_s3'],
                    'semestr_3'   => $row['semestr_3'],
                    'grid_id'  => $grid->id,
                    'Nazwa_pliku' => $nazwaPliku,

                );
            }
        }


        if(!empty($insert_data))
        {
            DB::table('Subjects')->insert($insert_data);

        }
    }
    return back()->with('success', 'Excel Data Imported successfully.');

    }


    function importMgrNS(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $year_id = $request->input('year_id');
        $kierunek_id = $request->input('kierunek_id');
        $inzynierskie = $request->input('inzynierskie');
        $stacjonarne = $request->input('stacjonarne');
        $nazwaPliku = $request->file('select_file')->getClientOriginalName();

        $path = $request->file('select_file')->getRealPath();
        $data = Excel::load($path)->get();
        $rok = StudyYear::where('id', $year_id)->first();
        $year = substr($rok->name, 0, 4);

        $existing_grid = Grid::where('nazwa_siatki', (int)$year)->
        where('year_id', $year_id)->
        where('stacjonarne', $stacjonarne)->
        where('inzynierskie', $inzynierskie)->first();

        if (is_null($existing_grid)) {
            Grid::create([
                'nazwa_siatki' => (int)$year,
                'year_id' => $year_id,
                'specialization_id' => $kierunek_id,
                'stacjonarne' => $stacjonarne,
                'inzynierskie' => $inzynierskie
            ]);
        }

        $grid = Grid::where('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', $stacjonarne)
            ->where('inzynierskie', $inzynierskie)->first();

            if ($data->count() > 0) {
                foreach ($data->toArray() as $key => $value) {
                    foreach ($value as $row) {
                        $insert_data[] = array(
                            'Przedmioty' => $row['przedmiot'],
                            'Forma_zaliczenia' => $row['forma_zaliczenia'],
                            'Wykład1' => $row['wyklad1'],
                            'Cw_Konw_Lab_1' => $row['cw_konw_lab_1'],
                            'ECTS_s1' => $row['ects_s1'],
                            'semestr_1' => $row['semestr_1'],
                            'Wykład2' => $row['wyklad2'],
                            'Cw_Konw_Lab_2' => $row['cw_konw_lab_2'],
                            'ECTS_s2' => $row['ects_s2'],
                            'semestr_2' => $row['semestr_2'],
                            'rok1' => $row['rok_1'],
                            'Wykład3' => $row['wyklad3'],
                            'Cw_Konw_Lab_3' => $row['cw_konw_lab_3'],
                            'ECTS_s3' => $row['ects_s3'],
                            'semestr_3' => $row['semestr_3'],
                            'grid_id' => $grid->id,
                            'Nazwa_pliku' => $nazwaPliku,

                        );
                    }
                }
                if (!empty($insert_data)) {
                    DB::table('Subjects')->insert($insert_data);

                }
            }
            return back()->with('success', 'Excel Data Imported successfully.');
        }

    public static function delete_subject(Request $request)
    {

        $id = $request->input('subject_id');


        // dd( $id);
        DB::table('subjects')->where('id', '=', $id)->delete();
        $komunikat = "Przedmiot został usunięty pomyślnie.";

        // Przekierowanie do /wybór przedmiotów
        return back()->with(compact('komunikat'));

    }




}

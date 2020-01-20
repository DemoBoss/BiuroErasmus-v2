<?php

namespace App\Http\Controllers;

use App\Grid;
use App\SelectedItem;
use App\Specialization;
use App\StudyYear;
use App\Subject;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class WyborController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('przedmioty')->with(compact('specializations'));
    }

    public function go_to_specialization($id)
    {

        $years = StudyYear::where('specialization_id', $id)->orderBy('name', 'DESC')->get();
        $specialization_id = $id;
        return view('wybor_roku')->with(compact('years', 'specialization_id'));
    }

    public function go_to_year($kierunek_id, $year_id)
    {
        $grid = Grid::where('specialization_id', $kierunek_id)
            ->where('year_id', $year_id)->first();

        if(is_null($grid)) {
            $rok = StudyYear::where('specialization_id', $kierunek_id)
                ->where('id', $year_id)->first();

            $grid = substr($rok->name, 0, 4);
            $gridd = ((int)$grid);

            $grid1 = $gridd -1;
             $grid2 = $gridd - 1;
              $grid3 = $gridd - 2;
                 $grid4 = $gridd - 3;
            $wybrane =SelectedItem::where('Na_rok', $gridd )->get();
            $wybrane2 =SelectedItem::where('Na_rok', $grid1 )->get();

        }
        else {
            $rok = StudyYear::where('specialization_id', $kierunek_id)
                ->where('id', $year_id)->first();
            $grid1 = $grid->nazwa_siatki;
            $grid2 = $grid->nazwa_siatki - 1;
            $grid3 = $grid->nazwa_siatki - 2;
            $grid4 = $grid->nazwa_siatki - 3;

       // dd($grid1,$grid2,$grid3,$grid4);
        $wybrane =SelectedItem::where('Na_rok', $grid1 )->get();
        $wybrane2 =SelectedItem::where('Na_rok', $grid2 )->get();
//         dd($wybrane);
        }


     //   $year = StudyYear::select('name')->where('specialization_id', $kierunek_id)->get();
        // dd($year);


//        $grids= [];
//        $subjects = [];




        $gridInzynierskie1 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid1)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        $gridMagisterskie1 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid1)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 0)->first();

        $subjectsInzs1 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
            ->where('semestr_1', '=', "tak")
            ->where('grid_id', $gridInzynierskie1->id)->get();

        $subjectsInzs2 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
            ->where('semestr_2', '=', "tak")
            ->where('grid_id', $gridInzynierskie1->id)->get();


        $subjectsMgrs1 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
            ->where('semestr_1', '=', "tak")
            ->where('grid_id', $gridMagisterskie1->id)->get();



   //     $subjectsMgr1 = Subject::where('grid_id', $gridMagisterskie1->id)->get();


//           -----------------------------------------------------------------------------------------
//        if($gridInzynierskie1 !== null){
//            $subjectsInz = Subject::where('grid_id', $gridInzynierskie1->id)->orderBy('przedmioty', 'ASC')->get();
//        }
//        else{
//
//            $subjectsInz = null;
//
//        }
//
//        if($gridMagisterskie !== null){
//            $subjectsMgr = Subject::where('grid_id', $gridMagisterskie->id)->orderBy('przedmioty', 'ASC')->get();
//        }
//        else{
//
//            $subjectsMgr = null;
//
//        }


        $gridInzynierskie2 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid2)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();


        $gridMagisterskie2 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid2)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 0)->first();


        $subjectsInzs3 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
            ->where('semestr_3', '=', "tak")
            ->where('grid_id', $gridInzynierskie2->id)->get();

        $subjectsInzs4 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
            ->where('semestr_4', '=', "tak")
            ->where('grid_id', $gridInzynierskie2->id)->get();

        $subjectsMgrs2 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
            ->where('semestr_2', '=', "tak")
            ->where('grid_id', $gridMagisterskie2->id)->get();

        $subjectsMgrs3 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
            ->where('semestr_3', '=', "tak")
            ->where('grid_id', $gridMagisterskie2->id)->get();



//        $subjectsInz2 = Subject::where('grid_id', $gridInzynierskie2->id)->get();
//        $subjectsMgr2 = Subject::where('grid_id', $gridMagisterskie2->id)->get();


        $gridInzynierskie3 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid3)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();


        $subjectsInzs5 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
            ->where('semestr_5', '=', "tak")
            ->where('grid_id', $gridInzynierskie3->id)->get();

        $subjectsInzs6 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
            ->where('semestr_6', '=', "tak")
            ->where('grid_id', $gridInzynierskie3->id)->get();

//        $subjectsInz3 = Subject::where('grid_id', $gridInzynierskie3->id)->get();
//        $subjectsMgr3 = Subject::where('grid_id', $gridMagisterskie3->id)->get();


        $gridInzynierskie4 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid4)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        if($gridInzynierskie4 !== null){
            $subjectsInzs7 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_7', '=', "tak")
                ->where('grid_id', $gridInzynierskie4->id)->get();
        }
        else{

            $subjectsInzs7 = null;

        }





//        $subjectsInz4 = Subject::where('grid_id', $gridInzynierskie4->id)->get();
//        $subjectsMgr4 = Subject::where('grid_id', $gridMagisterskie4->id)->get();


        //  dd($gridInzynierskie4, $gridMagisterskie4);


        return view('wybor_przedmiotow')->with(compact('rok','wybrane', 'wybrane2','grid1', 'grid2', 'grid3', 'grid4',
            'subjectsInzs1', 'subjectsInzs2', 'subjectsMgrs1',
           'subjectsInzs3', 'subjectsInzs4', 'subjectsMgrs2','subjectsMgrs3',
            'subjectsInzs5', 'subjectsInzs6',
            'subjectsInzs7'
                ));


//        for($i=$grid->nazwa_siatki; $i>=$grid->nazwa_siatki - 3; $i--){
//            $gridy = Grid::where('specialization_id',$kierunek_id)
//                ->where('nazwa_siatki', $i)->get();
//            foreach ($gridy as $grid){
//                array_push($grids, $grid);
//
//
//                $subjectsy = Subject::where('grid_id', $grid->id)->get();
//dd($grid, $subjectsy);
//                array_push($subjects, $subjectsy);
//
//                $gridInzynierskie = Grid::where('year_id', $year_id)
//                    ->where('specialization_id', $kierunek_id)
//                    ->where('stacjonarne', 1)
//                    ->where('inzynierskie', 1)->first();
//
//                $gridMagisterskie = Grid::where('year_id', $year_id)
//                    ->where('specialization_id', $kierunek_id)
//                    ->where('stacjonarne', 1)
//                    ->where('inzynierskie', 0)->first();
//
//                $subjectsInz = Subject::where('grid_id', $gridInzynierskie->id)->get();
//                $subjectsMgr = Subject::where('grid_id', $gridMagisterskie->id)->get();
//
//dd($subjectsInz,$subjectsMgr);
//
//            }
//
//        }
        // return view('wybor_przedmiotow')->with(compact('grid', 'subjects', 'subjectsInz' ,'subjectsMgr'));
    }


    public static function add_subject(Request $request)
    {

      //  $id = $request->input('subject_id');

      //  $subjects = Subject::where('id', $id)->first();
        $opis = $request->input('opis');
        $przedmiot = $request->input('przedmiot');
        $forma_zaliczenia = $request->input('forma_zaliczenia');
        $wyklad = $request->input('wyklad');
        $cw = $request->input('cw');
        $ects = $request->input('ects');
        $grid = $request->input('nazwa_roku');

       //dd( $przedmiot,$forma_zaliczenia,$wyklad,$cw,$ects,$opis);
        SelectedItem::insert([
            'Przedmioty' =>$przedmiot,
            'Forma_zaliczenia' => $forma_zaliczenia,
            'Wykład' => $wyklad,
            'Cw_Konw_Lab' => $cw,
            'ECTS' => $ects,
            'Na_rok' => $grid,
            'Opis' => $opis,


            ]);
        $komunikat = "Przedmiot został dodany pomyślnie.";

        // Przekierowanie do /posty
        return back()->with(compact('komunikat'));

    }

}
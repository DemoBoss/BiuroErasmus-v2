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

        if (is_null($grid)) {
            $rok = StudyYear::where('specialization_id', $kierunek_id)
                ->where('id', $year_id)->first();

            $grid = substr($rok->name, 0, 4);
            $gridd = ((int)$grid);

            $grid1 = $gridd - 1;
            $grid2 = $gridd - 1;
            $grid3 = $gridd - 2;
            $grid4 = $gridd - 3;
            $wybrane = SelectedItem::where('Na_rok', $gridd)->get();
            $wybrane2 = SelectedItem::where('Na_rok', $grid1)->get();

        } else {
            $rok = StudyYear::where('specialization_id', $kierunek_id)
                ->where('id', $year_id)->first();

            $grid1 = $grid->nazwa_siatki;
            $grid2 = $grid->nazwa_siatki - 1;
            $grid3 = $grid->nazwa_siatki - 2;
            $grid4 = $grid->nazwa_siatki - 3;

            // dd($grid1,$grid2,$grid3,$grid4);
            $wybrane = SelectedItem::where('Na_rok', $grid1)->get();
            $wybrane2 = SelectedItem::where('Na_rok', $grid2)->get();

        }


        $gridInzynierskie1 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid1)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie1 !== null) {

            $subjectsInzs1 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_1', '=', "tak")
                ->where('grid_id', $gridInzynierskie1->id)->get();

            $subjectsInzs2 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_2', '=', "tak")
                ->where('grid_id', $gridInzynierskie1->id)->get();
        } else {
            $gridInzynierskie1 = null;
            $subjectsInzs1 = null;
            $subjectsInzs2 = null;
        }

        $gridMagisterskie1 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid1)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 0)->first();

        if ($gridMagisterskie1 !== null) {

            $subjectsMgrs1 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_1', '=', "tak")
                ->where('grid_id', $gridMagisterskie1->id)->get();
        } else {
            $gridMagisterskie1 = null;
            $subjectsMgrs1 = null;

        }


        $gridInzynierskie2 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid2)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie2 !== null) {

            $subjectsInzs3 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_3', '=', "tak")
                ->where('grid_id', $gridInzynierskie2->id)->get();

            $subjectsInzs4 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_4', '=', "tak")
                ->where('grid_id', $gridInzynierskie2->id)->get();
        } else {
            $gridInzynierskie2 = null;
            $subjectsInzs3 = null;
            $subjectsInzs4 = null;
        }

        $gridMagisterskie2 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid2)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 0)->first();

        if ($gridMagisterskie2 !== null) {

            $subjectsMgrs2 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_2', '=', "tak")
                ->where('grid_id', $gridMagisterskie2->id)->get();

            $subjectsMgrs3 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_3', '=', "tak")
                ->where('grid_id', $gridMagisterskie2->id)->get();
        } else {

            $gridMagisterskie2 = null;
            $subjectsMgrs2 = null;
            $subjectsMgrs3 = null;


        }


        $gridInzynierskie3 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid3)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie3 !== null) {

            $subjectsInzs5 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_5', '=', "tak")
                ->where('grid_id', $gridInzynierskie3->id)->get();

            $subjectsInzs6 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_6', '=', "tak")
                ->where('grid_id', $gridInzynierskie3->id)->get();
        } else {

            $gridInzynierskie3 = null;
            $subjectsInzs5 = null;
            $subjectsInzs6 = null;


        }
        $gridInzynierskie4 = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid4)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie4 !== null) {
            $subjectsInzs7 = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_7', '=', "tak")
                ->where('grid_id', $gridInzynierskie4->id)->get();
        } else {

            $subjectsInzs7 = null;

        }

//        STUDIA NIESTACJONARNE---------------------------------------------------------------------------------------------------------------


        $gridInzynierskie1ns = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid1)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie1ns !== null) {

            $subjectsInzs1ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_1', '=', "tak")
                ->where('grid_id', $gridInzynierskie1ns->id)->get();

            $subjectsInzs2ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_2', '=', "tak")
                ->where('grid_id', $gridInzynierskie1ns->id)->get();
        } else {
            $gridInzynierskie1ns = null;
            $subjectsInzs1ns = null;
            $subjectsInzs2ns = null;
        }

        $gridMagisterskie1ns = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid1)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 0)->first();

        if ($gridMagisterskie1ns !== null) {

            $subjectsMgrs1ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_1', '=', "tak")
                ->where('grid_id', $gridMagisterskie1ns->id)->get();
        } else {
            $gridMagisterskie1ns = null;
            $subjectsMgrs1ns = null;

        }


        $gridInzynierskie2ns = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid2)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie2ns !== null) {

            $subjectsInzs3ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_3', '=', "tak")
                ->where('grid_id', $gridInzynierskie2ns->id)->get();

            $subjectsInzs4ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_4', '=', "tak")
                ->where('grid_id', $gridInzynierskie2ns->id)->get();
        } else {
            $gridInzynierskie2ns = null;
            $subjectsInzs3ns = null;
            $subjectsInzs4ns = null;
        }

        $gridMagisterskie2ns = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid2)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 0)->first();

        if ($gridMagisterskie2ns !== null) {

            $subjectsMgrs2ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_2', '=', "tak")
                ->where('grid_id', $gridMagisterskie2ns->id)->get();

            $subjectsMgrs3ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_3', '=', "tak")
                ->where('grid_id', $gridMagisterskie2ns->id)->get();
        } else {

            $gridMagisterskie2ns = null;
            $subjectsMgrs2ns = null;
            $subjectsMgrs3ns = null;


        }


        $gridInzynierskie3ns = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid3)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie3ns !== null) {

            $subjectsInzs5ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_5', '=', "tak")
                ->where('grid_id', $gridInzynierskie3ns->id)->get();

            $subjectsInzs6ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład2', 'Cw_Konw_Lab_2', 'ECTS_s2', 'semestr_2', 'rok1')
                ->where('semestr_6', '=', "tak")
                ->where('grid_id', $gridInzynierskie3ns->id)->get();
        } else {

            $gridInzynierskie3ns = null;
            $subjectsInzs5ns = null;
            $subjectsInzs6ns = null;


        }

        $gridInzynierskie4ns = Grid::where('specialization_id', $kierunek_id)
            ->where('nazwa_siatki', $grid4)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 1)->first();

        if ($gridInzynierskie4ns !== null) {
            $subjectsInzs7ns = Subject::select('id', 'grid_id', 'Przedmioty', 'Forma_zaliczenia', 'Wykład1', 'Cw_Konw_Lab_1', 'ECTS_s1', 'semestr_1', 'rok1')
                ->where('semestr_7', '=', "tak")
                ->where('grid_id', $gridInzynierskie4ns->id)->get();
        } else {

            $subjectsInzs7ns = null;

        }


        return view('wybor_przedmiotow')->with(compact('rok', 'wybrane', 'wybrane2', 'grid1', 'grid2', 'grid3', 'grid4',
            'subjectsInzs1', 'subjectsInzs2', 'subjectsMgrs1',
            'subjectsInzs3', 'subjectsInzs4', 'subjectsMgrs2', 'subjectsMgrs3',
            'subjectsInzs5', 'subjectsInzs6',
            'subjectsInzs7', 'gridInzynierskie3',
            'gridInzynierskie2', 'gridInzynierskie1',
            'gridMagisterskie2', 'gridMagisterskie1',

            'subjectsInzs1ns', 'subjectsInzs2ns', 'subjectsMgrs1ns',
            'subjectsInzs3ns', 'subjectsInzs4ns', 'subjectsMgrs2ns', 'subjectsMgrs3ns',
            'subjectsInzs5ns', 'subjectsInzs6ns',
            'subjectsInzs7ns', 'gridInzynierskie3ns',
            'gridInzynierskie2ns', 'gridInzynierskie1ns',
            'gridMagisterskie2ns', 'gridMagisterskie1ns'
        ));

    }

    public static function add_subject(Request $request)
    {

        $opis = $request->input('opis');
        $przedmiot = $request->input('przedmiot');
        $forma_zaliczenia = $request->input('forma_zaliczenia');
        $wyklad = $request->input('wyklad');
        $cw = $request->input('cw');
        $ects = $request->input('ects');
        $grid = $request->input('nazwa_roku');
        $rok = $request->input('na_rok');
        $g2= $grid+1;
$g= $grid . '/'. $g2;

      // dd( $rok);
        SelectedItem::insert([
            'Przedmioty' =>$przedmiot,
            'Forma_zaliczenia' => $forma_zaliczenia,
            'Wykład' => $wyklad,
            'Cw_Konw_Lab' => $cw,
            'ECTS' => $ects,
            'Na_rok' => $rok,
            'Siatka_z_roku' => $g,
            'Opis' => $opis,


            ]);
        $komunikat = "Przedmiot został dodany pomyślnie.";

        // Przekierowanie do /wybór przedmiotów
        return back()->with(compact('komunikat'));

    }


    public static function delete_subject(Request $request)
    {

        $id = $request->input('subject_id');


        // dd( $id);
        DB::table('selected_items')->where('id', '=', $id)->delete();
        $komunikat = "Przedmiot został usunięty z wyranych przedmiotów pomyślnie.";

        // Przekierowanie do /wybór przedmiotów
        return back()->with(compact('komunikat'));

    }

}
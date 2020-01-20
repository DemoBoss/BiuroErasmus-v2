<?php

namespace App\Http\Controllers;

use App\Grid;
use App\Specialization;
use App\StudyYear;
use App\Subject;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class KierunkiController extends Controller
{

    public function index()
    {
        $specializations = Specialization::all();
        return view('kierunki')->with(compact('specializations'));
    }

    public function stworz_kierunek(Request $request){

        $nazwa_kierunku = $request->input('nazwa_kierunku');


        Specialization::create([
            'nazwa' => $nazwa_kierunku,
        ]);
        $komunikat = "Kierunek został dodany pomyślnie.";


        // Przekierowanie do /posty
        return back()->with(compact('komunikat'));
    }

    public function go_to_specialization($id){

        $id_kierunku = $id;

        $kierunek = Specialization::where('id', $id_kierunku)->first();


        $lata = StudyYear::where('specialization_id', $id)->orderBy('name', 'DESC')->get();


        return view('years')->with(compact('kierunek', 'lata'));
    }

    public function stworz_rok(Request $request){

        $nazwa_roku = $request->input('nazwa_roku');
        $specialization_id = $request->input('specialization_id');

        StudyYear::create([
           'name' => $nazwa_roku,
            'specialization_id' => $specialization_id,
        ]);

        $komunikat = "Rok został dodany pomyślnie.";



        return back()->with(compact('komunikat'));
    }

    public function go_to_year($kierunek_id, $year_id){


        return view('tok_studiow')->with(compact('kierunek_id', 'year_id'));
    }

    public function go_to_stacjonarne($kierunek_id, $year_id){

        $grid = Grid::where('specialization_id', $kierunek_id)
            ->where('year_id', $year_id)->first();

        $gridInzynierskie = Grid::where('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 1)->first();

        $gridMagisterskie = Grid::where('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', 1)
            ->where('inzynierskie', 0)->first();

        if($gridInzynierskie !== null){
            $subjectsInz = Subject::where('grid_id', $gridInzynierskie->id)->orderBy('przedmioty', 'ASC')->get();
        }
        else{

            $subjectsInz = null;

        }

        if($gridMagisterskie !== null){
         $subjectsMgr = Subject::where('grid_id', $gridMagisterskie->id)->orderBy('przedmioty', 'ASC')->get();
         }
         else{

         $subjectsMgr = null;

        }

//        $subjectsInz = Subject::where('grid_id', $gridInzynierskie->id)->get();
//        $subjectsMgr = Subject::where('grid_id', $gridMagisterskie->id)->get();

        return view('stacjonarne')->with(compact('kierunek_id', 'year_id', 'subjectsInz', 'subjectsMgr', 'grid'));

    }

    public function go_to_niestacjonarne($kierunek_id, $year_id){

        $grid = Grid::where('specialization_id', $kierunek_id)
            ->where('year_id', $year_id)->first();

        $gridInzynierskieNS = Grid::where('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 1)->first();

        $gridMagisterskieNS = Grid::where('year_id', $year_id)
            ->where('specialization_id', $kierunek_id)
            ->where('stacjonarne', 0)
            ->where('inzynierskie', 0)->first();

        if($gridInzynierskieNS !== null){
            $subjectsInzNS = Subject::where('grid_id', $gridInzynierskieNS->id)->orderBy('przedmioty', 'ASC')->get();
        }
        else{

            $subjectsInzNS = null;

        }

        if($gridMagisterskieNS !== null){
         $subjectsMgrNS = Subject::where('grid_id', $gridMagisterskieNS->id)->orderBy('przedmioty', 'ASC')->get();
         }
         else{

         $subjectsMgrNS = null;

        }

//        $subjectsInz = Subject::where('grid_id', $gridInzynierskieNS->id)->get();
//        $subjectsMgr = Subject::where('grid_id', $gridMagisterskieNS->id)->get();

        return view('niestacjonarne')->with(compact('kierunek_id', 'year_id', 'subjectsInzNS', 'subjectsMgrNS', 'grid'));

    }



}

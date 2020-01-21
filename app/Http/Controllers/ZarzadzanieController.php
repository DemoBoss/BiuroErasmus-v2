<?php

namespace App\Http\Controllers;

use App\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class zarzadzanieController extends Controller
{

    public function __construct()
    {
        $this->middleware('notLoggedIn');

    }


    public function go_to_zarzadzanie(){


        $admini = DB::table('users')->where('role_name', 'Admin')->get();
        $users = DB::table('users')->where('role_name', 'User')->get();
        $all_users = User::all();



        return view('zarzadzanie', compact('admini','users', 'all_users'));
    }



    public function usun_admina(Request $request){

        $login = $request->input('login');

        DB::table('users')
            ->where('name', $login)
            ->update(['role_name'=>"User"]);
        $status = 'Użytkownik "'.$login.'" stał się zwykłym użytkownikiem.';



        return redirect('zarzadzanie')->with(compact('status'));
    }



    public function dodaj_admina(Request $request){

        $user_id = $request->input('user_id');

        $user = DB::table('users')->where('id', $user_id)->first();

        $users = User::pluck('id');

        if(!$users->contains($user_id)){

            $status = 'Użytkownik o loginie "'. $user->name .'" nie istnieje.';

        }else{


            if($user->role_name == 'Admin'){

                $status = 'Użytkownik "'.$user->name.'" już jest adminem.';

            }else {
                DB::table('users')->where('id', $user_id)->update(['role_name' => 'Admin']);
                $status = 'Użytkownik "' . $user->name . '" został adminem.';
            }
        }


        return redirect('zarzadzanie')->with(compact('status'));
    }








}

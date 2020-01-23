<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/zarzadzanie', 'zarzadzanieController@zarzadzanie');

Route::get('/prowadzacy', 'TeacherController@index');

Route::get('/prowadzacy/{id}', 'TeacherController@showTeacher');

Route::post('/importInz', 'SiatkiController@importInz');

Route::post('/importInzNS', 'SiatkiController@importInz');

Route::post('/importMgr', 'SiatkiController@importMgr');

Route::post('/importMgrNS', 'SiatkiController@importMgr');

Route::get('/tworzenie_siatki', 'SiatkiController@tworzenie_siatki');

Route::get('/tworzenie_przedmiotu', 'SiatkiController@tworzenie_przedmiotu');

Route::get('/dodaj_prowadzacego', 'TeacherController@dodaj_prowadzacego');

Route::get('/kierunki', 'KierunkiController@index');

Route::get('/kierunki/{id}', 'KierunkiController@go_to_specialization');

Route::get('/kierunki/{kierunek_id}/{year_id}', 'KierunkiController@go_to_year');

Route::get('/kierunki/{kierunek_id}/{year_id}/stacjonarne', 'KierunkiController@go_to_stacjonarne');

Route::get('/kierunki/{kierunek_id}/{year_id}/niestacjonarne', 'KierunkiController@go_to_niestacjonarne');

Route::get('/tworzenie_roku', 'KierunkiController@stworz_rok');

Route::get('/tworzenie_kierunku', 'KierunkiController@stworz_kierunek');

Route::get('/wybor', 'WyborController@index');

Route::get('/wybor/{id}', 'WyborController@go_to_specialization');

Route::get('/wybor/{kierunek_id}/{year_id}', 'WyborController@go_to_year');

Route::get('/dodaj_przedmiot', 'WyborController@add_subject');

Route::get('/delete_subject', 'SiatkiController@delete_subject');

Route::post('/import_excel/import', 'ImportExcelController@import');

Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');

Route::get('/zarzadzanie' , 'zarzadzanieController@go_to_zarzadzanie');

Route::get('/nowy_admin', 'zarzadzanieController@dodaj_admina');

Route::get('/usun_admina', 'zarzadzanieController@usun_admina');


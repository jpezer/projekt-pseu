<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/stranice/okvir','StraniceController@prikazi_okvir')->name('stranice.okvir');
Route::get('/stranice/informacije','StraniceController@prikazi_informacije')->name('stranice.informacije');

Route::get('/stranice/pregled_studija','StudijController@index')->name('stranice.pregled_studija');
Route::get('/stranice/dodaj_studij','StudijController@create_form')->name('stranice.dodaj_studij');
Route::get('/stranice/uredi_studij/{id}','StudijController@edit_form')->name('stranice.uredi_studij');
Route::get('/stranice/izbrisi_studij/{id}','StudijController@delete')->name('stranice.izbrisi_studij');
Route::post('/stranice/spremi_studij','StudijController@create')->name('stranice.spremi_studij');
Route::post('/stranice/uredi_studij/{id}','StudijController@edit')->name('stranice.uredi_studij');


Route::get('/stranice/pregled_predmeta','PredmetController@index')->name('stranice.pregled_predmeta');
Route::get('/stranice/dodaj_predmet','PredmetController@create_form')->name('stranice.dodaj_predmet');
Route::get('/stranice/uredi_predmet/{id}','PredmetController@edit_form')->name('stranice.uredi_predmet');
Route::get('/stranice/izbrisi_predmet/{id}','PredmetController@delete')->name('stranice.izbrisi_predmet');
Route::post('/stranice/spremi_predmet','PredmetController@create')->name('stranice.spremi_predmet');
Route::post('/stranice/uredi_predmet/{id}','PredmetController@edit')->name('stranice.uredi_predmet');


Route::get('/stranice/pregled_zadaca','ZadacaController@index')->name('stranice.pregled_zadaca');
Route::get('/stranice/moje_zadace','ZadacaController@homeworks')->name('stranice.moje_zadace');
Route::get('/stranice/dodaj_zadacu','ZadacaController@create_form')->name('stranice.dodaj_zadacu');
Route::get('/stranice/izbrisi_zadacu/{id}','ZadacaController@delete')->name('stranice.izbrisi_zadacu');
Route::post('/stranice/spremi_zadacu','ZadacaController@create')->name('stranice.spremi_zadacu');
Route::get('/stranice/preuzmi_zadacu/{file_path}','ZadacaController@download')->name('stranice.preuzmi_zadacu');

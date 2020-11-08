<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ModuloRegistro
Route::get('registro','EstudianteController@index')->name('student.Iregistro')->middleware('can:student.Iregistro');

Route::get('Cuar/{id}','EstudianteController@getRoom');

Route::get('Mun/{id}','EstudianteController@getMunicipio');

Route::post('/registroadd','EstudianteController@store')->name('student.store');



//Modulo Eliminar y Actualizar
Route::get('student/getdata','EstudianteController@getData')->name('student.getData');

//seccion Actualizar
Route::get('EstuList','EstudianteController@getEstuInfo')->name('student.Iedit')->middleware('can:student.Iedit');

Route::get('Estudent/{id}/edit','EstudianteController@edit')->name('student.edit');

Route::post('Estudent/{id}','EstudianteController@update')->name('student.update')->middleware('can:student.Iedit');

// Auth::routes();
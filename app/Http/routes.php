<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('ingreso');
});

// USERS

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup',
]);

Route::get('/inicio', [
    'uses' => 'UserController@getInicio',
    'as' => 'inicio'
]);

Route::get('auth/logout', [
    'uses' => 'UserController@logout',
    'as' => 'salir'
]);

Route::get('/perfil', [
    'uses' => 'UserController@getPerfil',
    'as' => 'perfil',
    'middleware' => 'auth',
]);

Route::get('/perfil/{id}', [
    'uses' => 'UserController@getPerfilID',
    'as' => 'perfilID',
    'middleware' => 'auth',
]);

Route::post('/editarUsuario', [
    'uses' => 'UserController@editar',
    'as' => 'editarUsuario',
    'middleware' => 'auth',
]);

// DOCENTE

Route::get('/docente', [
    'uses' => 'DocenteController@getHome',
    'as' => 'docente',
    'middleware' => 'auth',
]);

// ADMIN

Route::get('/admin', [
    'uses' => 'AdminController@getHome',
    'as' => 'admin',
    'middleware' => 'auth',
]);

// EDITAR

Route::get('/adminEditar', [
    'uses' => 'AdminController@getEditar',
    'as' => 'editar',
    'middleware' => 'auth',
]);

Route::get('/vistaEditarEvento/{id}', [
    'uses' => 'EventController@vistaEditarEvento',
    'as' => 'vistaEditarEvento',
    'middleware' => 'auth',
]);

Route::get('/vistaEditarCurso/{id}', [
    'uses' => 'CursoController@vistaEditarCurso',
    'as' => 'vistaEditarCurso',
    'middleware' => 'auth',
]);

Route::get('/vistaEditarCampus/{id}', [
    'uses' => 'CampusController@vistaEditarCampus',
    'as' => 'vistaEditarCampus',
    'middleware' => 'auth',
]);

Route::get('/vistaEditarFacultad/{id}', [
    'uses' => 'FacultyController@vistaEditarFacultad',
    'as' => 'vistaEditarFacultad',
    'middleware' => 'auth',
]);

Route::get('/vistaEditarUsuario/{id}', [
    'uses' => 'UserController@vistaEditarUsuario',
    'as' => 'vistaEditarUsuario',
    'middleware' => 'auth',
]);

// FACULTY

Route::post('/editarFacultad', [
    'uses' => 'FacultyController@editar',
    'as' => 'editarFacultad',
]);

// CAMPUS

Route::post('/editarCampus', [
    'uses' => 'CampusController@editar',
    'as' => 'editarCampus',
]);


// AYUDANTE

Route::get('/ayudante', [
    'uses' => 'AyudanteController@getHome',
    'as' => 'ayudante',
    'middleware' => 'auth',
]);

// CURSOS

Route::post('/ingresarCurso', [
    'uses' => 'CursoController@ingresar',
    'as' => 'ingresarCurso',
]);

Route::get('inscribirAyudante/{user_id}/{course_id}', [
    'uses' => 'CursoController@inscribirAyudante',
    'as' => 'inscribirAyudante'
]);

Route::post('/editarCurso', [
    'uses' => 'CursoController@editar',
    'as' => 'editarCurso',
]);

// EVENTOS

Route::post('/ingresarEvento', [
    'uses' => 'EventController@ingresar',
    'as' => 'ingresarEvento',
]);

Route::post('/editarEvento', [
    'uses' => 'EventController@editar',
    'as' => 'editarEvento',
]);

Route::get('/borrarEvento/{id}', [
    'uses' => 'EventController@borrar',
    'as' => 'borrarEvento',
    'middleware' => 'auth'
]);

Route::get('/listaEventosAyudantes', [
    'uses' => 'EventController@getEventosAyudante',
    'as' => 'listaEventosAyudantes',
    'middleware' => 'auth'
]);

Route::get('/evento/{id}', [
    'uses' => 'EventController@getEvento',
    'as' => 'evento',
    'middleware' => 'auth'
]);

Route::get('/eventos', [
    'uses' => 'EventController@getEventos',
    'as' => 'eventos',
    'middleware' => 'auth'
]);

Route::get('borrarInscripcion/{student_id}/{course_id}', [
    'uses' => 'CursoController@borrarInscripcion',
    'as' => 'borrarInscripcion'
]);

//IMPORTAR

Route::get('importar', [
    'uses' => 'ImportarController@getImportar',
    'as' => 'importar',
    'middleware' => 'auth'
]);

Route::post('importar/upload', [
    'uses' => 'ImportarController@upload',
    'as' => 'importar.upload',
    'middleware' => 'auth'
]);

Route::get('importarDatos', [
    'uses' => 'ImportarController@importarDatos',
    'as' => 'importarDatos',
    'middleware' => 'auth'
]);

// PDF

Route::get('pdf', 'PDFController@invoice');
Route::get('pdfEvento/{event_id}', ['as' => 'pdfEvento', 'uses' => 'PDFController@pdfEvento']);

// MAIL

Route::post('/send', ['as' => 'send', 'uses' => 'MailController@send'] );
Route::get('/contact', ['as' => 'contact', 'uses' => 'MailController@index'] );
Route::get('/tomaAyudante/{teacher_id}', ['as' => 'tomaAyudante', 'uses' => 'MailController@tomaAyudante'] );

Route::get('/confirmacionDocente', ['as' => 'confirmacionDocente', 'uses' => 'MailController@confirmacionDocente'] );

// JSON -> calendario.js

Route::get('evento',['uses'=>'EventController@index']);
Route::get('eventoDocente',['uses'=>'EventController@eventosDocente', 'as' => 'eventoDocente']);
Route::get('eventosAyudante',['uses'=>'EventController@eventosAyudante', 'as' => 'eventosAyudante']);
Route::get('eventosAdmin',['uses'=>'EventController@eventosAdmin', 'as' => 'eventosAdmin']);
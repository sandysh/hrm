<?php



// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

Route::get('/', 'HomeController@index');

Route::any('punch','PunchController@store');

Route::get('punchView','PunchController@showPunchView');

Route::any('punchout','PunchController@punchout');

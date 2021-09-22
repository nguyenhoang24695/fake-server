<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return '1';
});

Route::get('/upload_plantix1', function (Request $request) {
    return file_get_contents('data.txt');
});
Route::post('/upload_plantix', function (Request $request) {
//    dd($request->files);
    $data = '';
//    foreach($request->allFiles() as $key => $value){
//        fwrite($fp, $key);
//    }
    foreach($request->all() as $key => $value){
        $data = $data.$key;
        $data = $data.":";
        $data = $data.$value;
        $data = $data."\n";
    }

    file_put_contents('./data.txt', $data.PHP_EOL );
    return $request->all();
});


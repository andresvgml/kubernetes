<?php

use App\Jobs\TestJob;
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
    return view('welcome');
});


Route::get('/sqs', function () {
    for ($i=0; $i < 10; $i++) { 
        $job = "Job:" . $i . " --- " . rand();
        dump($job);
        dispatch(new TestJob($job));
    }
});
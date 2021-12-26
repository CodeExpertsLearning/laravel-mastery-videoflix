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

Route::get('/', function () {
//    \App\Jobs\Test\TestJob::dispatch();
//    \App\Jobs\Test\PushJob::dispatch()->onQueue('deploy');
//    \App\Jobs\Test\DeployJob::dispatch()->onQueue('deploy');

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->prefix('/content')->name('content.')->group(function(){

    Route::get('/', \App\Http\Livewire\Content\Index::class)->name('index'); //content.index

    Route::get('/create', \App\Http\Livewire\Content\Create::class)->name('create');

    Route::get('/{content}', \App\Http\Livewire\Content\Edit::class)->name('edit');

    Route::get('/{content}/videos/create', \App\Http\Livewire\Content\VideoCreate::class)->name('video.create');

});

require __DIR__.'/auth.php';

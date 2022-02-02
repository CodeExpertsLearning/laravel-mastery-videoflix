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

Route::get('notifications', \App\Http\Livewire\Notification::class)
    ->middleware('auth')
    ->name('notifications');

Route::middleware(['auth'])->prefix('/content')->name('content.')->group(function(){

    Route::get('/', \App\Http\Livewire\Content\Index::class)->name('index'); //content.index

    Route::get('/create', \App\Http\Livewire\Content\Create::class)->name('create');

    Route::get('/{content}', \App\Http\Livewire\Content\Edit::class)->name('edit');

    Route::get('/{content}/videos/create', \App\Http\Livewire\Content\Video\CreateVideo::class)->name('video.create');
    Route::get('/{content}/videos/list', \App\Http\Livewire\Content\Video\ListVideo::class)->name('video.list');
    Route::get('/{content}/videos/edit/{video}', \App\Http\Livewire\Content\Video\EditVideo::class)->name('video.edit');
});

Route::get('/watch/{video:code}',\App\Http\Livewire\Player::class)
    ->middleware('auth')
    ->name('video.player');


Route::get('resources/{code}/{video}', function($code, $video = null) {
    $video = $code . '/' . $video;

    return \Illuminate\Support\Facades\Storage::disk('videos_processed')
        ->response(
            $video, null, [
                'Content-Type' => 'application/x-mpegURL',
                'isHls' => true
            ]
        );
})->middleware('auth');

require __DIR__.'/auth.php';

Route::get('/notification', function() {
    $user = \App\Models\User::first();

    //$user->notify(new \App\Notifications\VideoProcessedNotification());

    //dd($user->unreadNotifications->first()->markAsRead());
    //dd($user->unreadNotifications()->where('id', "6d30233b-8061-4b62-b716-48fc82368884")->first()->markAsRead());
    dd($user->readNotifications);
});

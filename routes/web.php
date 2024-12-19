<?php

use App\Livewire\Cargo;
use App\Livewire\Escola;
use App\Livewire\User;
use App\Livewire\Message;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('users-acrtivity', User\ActivityIndex::class)->name('users.activity.index');

    Route::get('user', User\Index::class)->name('user.index');

    Route::get('escola', Escola\Index::class)->name('escola.index')->can('admin_access');

    Route::get('message', Message\Index::class)->name('message.index')->can('admin_access');


    Route::get('newMessages', Message\NewMessages::class)->name('newMessages.index');


});

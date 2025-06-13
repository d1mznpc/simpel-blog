<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Posts\Index;
use App\Livewire\Posts\Show;
use App\Livewire\Posts\Create;
use App\Livewire\Posts\About;
use App\Livewire\Posts\Edit;

Route::get('/', function () {
    return redirect()->route('posts.index');
})->name('home');
Route::get('/posts', Index::class)->name('posts.index');
Route::get('/posts/create', Create::class)->name('posts.create');
Route::get('/about', About::class)->name('about');
Route::get('/posts/{id}/edit', Edit::class)->name('posts.edit');
Route::get('/posts/{id}', Show::class)->name('posts.show');


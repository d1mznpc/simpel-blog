<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts\Index;
use App\Http\Livewire\Posts\Create;
use App\Http\Livewire\Posts\Edit;
use App\Http\Livewire\Posts\Show;

Route::get('/posts', Index::class)->name('posts.index');
Route::get('/posts/create', Create::class)->name('posts.create');
Route::get('/posts/{id}/edit', Edit::class)->name('posts.edit');
Route::get('/posts/{id}', Show::class)->name('posts.show');

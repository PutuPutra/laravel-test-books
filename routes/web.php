<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::resource('/', AuthorController::class)
    ->parameters(['' => 'author'])
    ->names([
        'index' => 'authors.index',
        'create' => 'authors.create',
        'store' => 'authors.store',
        'edit' => 'authors.edit',
        'update' => 'authors.update',
        'destroy' => 'authors.destroy',
    ])
    ->except('show');

Route::resource('books', BookController::class);

Route::get('/change-language/{locale}', function ($locale) {

    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('change.language');

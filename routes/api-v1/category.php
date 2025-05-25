<?php

declare(strict_types=1);

use App\Http\Controllers\ApiV1\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->name('category.')->group(function () {
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('tree', [CategoryController::class, 'tree'])->name('tree');
    });
});

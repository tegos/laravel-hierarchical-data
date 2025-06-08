<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('tree-recursive', [CategoryController::class, 'treeRecursive'])->name('tree.recursive');
        Route::get('tree-adjacency', [CategoryController::class, 'treeAdjacency'])->name('tree.adjacency');
        Route::get('tree-nested-set', [CategoryController::class, 'treeNestedSet'])->name('tree.nested.set');
    });
});

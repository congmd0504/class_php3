<?php
use Illuminate\Support\Facades\Route;
Route::prefix('post')->group(function () {
    Route::get('list', function () {
        return "list";
    });
    Route::get('create', function () {
        return "create";
    });
    Route::get('delete', function () {
        return "delete";
    });
    Route::get('edit', function () {
        return "edit";
    });
});
?>
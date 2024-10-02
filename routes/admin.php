<?php
use Illuminate\Support\Facades\Route;
//Nhóm đường dẫn theo tiền tố
Route::prefix('admin')->group(function () {
    Route::get('product', function () {
        return "Product";
    });
    Route::get('category', function () {
        return "category";
    });
    Route::get('user', function () {
        return "user";
    });
});
?>
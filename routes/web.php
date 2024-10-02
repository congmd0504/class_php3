<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('test', function () {
//     return "Test url";
// });
Route::get('/test-controller', [TestController::class, 'index']);
//Truyền tham số vào đường dẫn
Route::get('/product/{id}', function ($id) {
    return "Product id : $id";
});
//Truy cập trực tiếp đến view
Route::view('/welcome', 'welcome');
//Truyền nhiều tham số vào đường dẫn
Route::get('/product/{id}/comment/{comment_id}', function ($id, $comment_id) {
    return "Product id : $id & comment : $comment_id";
});
//Tham số truyền vào có thể rỗng
Route::get('/user/{id}/comment/{comment_id?}', function ($id, $comment_id = "công") {
    return "User id : $id & comment : $comment_id";
});
//Chỉ định dữ liệu tham số 
Route::get('/user/{name}', function ($name) {
    // ...
})->where('name', '[A-Za-z]+');
//Chỉ định dữ liệu nhiều tham số 
Route::get('/user/{id}/{name}', function ($id, $name) {
    // ...
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
//Đặt tên cho đường dẫn
Route::get('admin', function () {
    return "Admin";
})->name('admin');

Route::view('menu', 'menu');

// //Query buider
// Route::get('posts',function(){
//     // $posts= DB::table('posts')->get();
//     //Lấy dữ liệu theo cột
//     $posts = DB::table('posts')
//     ->select('title','content')
//     ->get();
//     //Lấy dữ liệu có điều kiện
//     $posts = DB::table('posts')
//     ->where('category_id',1)
//     ->get();
//     $posts= DB::table('posts')
//     ->where('id','>','80')
//     ->get();
//     //Lấy dữ liệu theo điều LIKE 
//     $posts =DB::table('posts')
//     ->where('title','LIKE','%ipsum%')
//     ->get();
//     //Nối hai bảng post và categories
//     $posts = DB::table('posts')
//     ->join('categories','posts.category_id','=','categories.id')
//     ->get();
//     return $posts;

// })->name('posts');

// //Lấy ra 1 bản ghi 
// Route::get('post/{id}',function ($id){
//     $post = DB::table('posts')
//     ->where('id',$id)
//     ->first();
//     return $post;
// });
Route::get('posts', [PostController::class, 'home'])->name('posts.home');
Route::get('category/{category_id}', [PostController::class, 'list'])->name('posts.list');
Route::get('/post/{id}', [PostController::class, 'detail'])->name('posts.detail');

Route::get('/test', [PostController::class, 'test']);
Route::get('/test/index', [PostController::class, 'index']);


Route::prefix('admin')->group(function () {
    Route::get('posts', [AdminPostController::class, 'index'])->name('admin.post.index');
    Route::get('posts/create',[AdminPostController::class,'create'])->name('admin.post.create');
    Route::post('posts/create',[AdminPostController::class,'store'])->name('admin.post.store');
    Route::get('posts/edit/{id}',[AdminPostController::class,'edit'])->name('admin.post.edit');
    Route::put('posts/edit/{id}',[AdminPostController::class,'update'])->name('admin.post.update');
    Route::delete('posts/delete/{post}',[AdminPostController::class,'destroy'])->name('admin.post.destroy');
});
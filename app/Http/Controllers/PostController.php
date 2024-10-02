<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function home()
    {
        //Hiển thị 8 bài mới nhất 
        $posts = DB::table('posts')
            ->orderByDesc('id')
            ->limit(8)
            ->get();
        return view('home', compact('posts'));
    }
    public function list($category_id)
    {
        $posts = DB::table('posts')
            ->where('category_id', $category_id)
            ->paginate(5);
        return view('list-post', compact('posts'));
    }
    public function detail($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        // dd($post);
        return view('detail', compact('post'));
    }
    public function test()
    {
        $posts = Post::all();
        $posts = Post::query()
            ->orderByDesc('id')
            ->take(10)
            ->get();

        //Điều kiện
        $posts = Post::query()->where('category_id', 1)->get();
        $posts = Post::query()->where('title', 'LIKE', '%aut%')->get();
        return $posts;
    }
    public function index()
    {
        //Sử dụng phân trang 
        $posts = Post::query()->paginate(5);
        return view('home', compact('posts'));
    }
}

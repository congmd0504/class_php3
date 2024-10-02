<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        // dd($categories);
        return view('admin.posts.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->except('image');
        if($request->hasFile('image')){
            //upload ảnh
            $path = $request->file('image')->store('image');
        }
        $data['image'] = $path;
        Post::query()->create($data);
        return redirect()->route('admin.post.index')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::query()->where('id',$id)->first();
        $categories = Category::pluck('name','id');
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->except('image');
        
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images');
            Storage::delete($request->image);
            $data['image'] = $path;
        }
       $post->update($data);
        return redirect()->route('admin.post.index')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post )
    {
        Storage::delete($post->image);
        $post ->delete();
        return redirect()->route('admin.post.index')->with('success','Xóa thành công');
    }
}

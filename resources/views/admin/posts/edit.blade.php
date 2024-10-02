@extends('admin.layout')
@section('title')
    Cập nhập
@endsection
@section('content')
    <h2>Cập nhập</h2>
    <form action="{{ route('admin.post.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image">
        <img src="{{ Storage::url($post->image) }}" height="100px" alt=""><br>
        <label for="">description</label>
        <input type="text" class="form-control" name="description" value="{{ $post->description }}">
        <label for="">Content</label>
        <textarea name="content" id="" class="form-control" cols="30" rows="5">{{ $post->content }}</textarea>
        <label for="">Danh mục</label>
        <select name="category_id" id="" class="form-select">
            @foreach ($categories as $id => $name)
                <option value="{{ $id }}" @selected($id == $post->category_id)>{{ $name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
        <a href="{{ route('admin.post.index') }}" class="btn btn-danger mt-3">Danh sách</a>
    </form>
@endsection

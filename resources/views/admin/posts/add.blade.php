@extends('admin.layout')
@section('title')
    Thêm mới
@endsection
@section('content')
<h2>Thêm mới</h2>
<form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">Title</label>
    <input type="text" class="form-control" name="title">
    <label for="">Image</label>
    <input type="file" class="form-control" name="image">
    <label for="">description</label>
    <input type="text" class="form-control" name="description">
    <label for="">Content</label>
    <textarea name="content" id="" class="form-control" cols="30" rows="5"></textarea>
    <label for="">Danh mục</label>
    <select name="category_id" id="" class="form-select">
        @foreach ($categories as $id =>$name )
            <option value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success mt-3">Submit</button>
    <a href="{{route('admin.post.index')}}" class="btn btn-danger mt-3">Danh sách</a>
</form>
@endsection
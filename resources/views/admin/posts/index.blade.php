@extends('admin.layout')
@section('title')
    danh sách
@endsection
@section('content')
    @if (session()->has('success'))
        <h4 class="alert alert-success">{{ session('success') }}</h4>
    @endif
        <a href="{{ route('admin.post.create') }}" class="btn btn-info m-3">Thêm mới</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>title</th>
                    <th>category</th>
                    <th>image</th>
                    <th>description</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td><img src="{{ $post->image }}" height="70px" alt="">
                            <img src="{{ Storage::url($post->image) }}" height="70px" alt="">
                        </td>
                        <td>{{ $post->description }}</td>
                        <td style="width:200px;" class="d-flex">
                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('admin.post.destroy', $post) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2"
                                    onclick="return confirm('Bạn có muốn xóa không ?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endsection

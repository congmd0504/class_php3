<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
   <table class="table table-hover table table-border">
    <thead>
        <th>Tiêu đề</th>
        <th>Mô tả</th>
        <th>Nội dung</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </thead>
    @foreach ($posts as $post)
     <tbody >
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->content}}</td>
        <td><img src="{{$post->image}}" height="70px" alt=""></td>
        <td><a href="{{route('posts.detail',$post->id)}}" class="btn btn-info">Chi tiết</a></td>
    </tbody>
    @endforeach
   </table>
   {{$posts->links()}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
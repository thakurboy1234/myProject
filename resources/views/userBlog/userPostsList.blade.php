@extends('user_layout')
@section('content')
<div class="container">
    <table class="table table-success table-striped">
        <div class="w3-bar">
            <h2 class="w3-button w3-left" >My Posts</h2>
            <button class="w3-button w3-green w3-right"><a href="{{route('create_blog')}}">add</a> </button>
        </div>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Comment(Count)</th>
                <th scope="col">Like(Count)</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $key=>$blog)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$blog->title}}</td>
                <td>{{count($blog->comment)}}</td>
                <td>{{count($blog->like)}}</td>
                <td>
                    <a href="{{route('view_post',$blog->id)}}">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

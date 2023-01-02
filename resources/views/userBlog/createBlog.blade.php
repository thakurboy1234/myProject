@extends('user_layout')
@section('content')
    <h1>Blog</h1>
    <form method="POST" action="{{route('store_blog')}}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="title" placeholder="Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2"></span>
          </div>
        <div class="form-floating">
            <textarea class="form-control" name="discription" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
          </div>
          <button type="submit" class="btn btn-primary">submit</button>
    </form>
@endsection





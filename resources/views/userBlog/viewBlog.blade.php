@extends('user_layout')
@section('content')
    <div class="container" style="text-align: -webkit-center;">
        <div class="card text-white bg-success mb-3" style=" text-align: justify;">
            <div class="card-header">Blog</div>
            <div class="card-body">
                <h5 class="card-title">Title: {{ $blogs->title }}</h5>
                <p class="card-text">Discription: {{ $blogs->discription }}</p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="color: black;">
                            [{{ count($blogs->comment) }}] Comments
                        </div>
                        @foreach ($blogs->comment as $value)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $value->user->First_name }}: {{ $value->comment }}</li>
                                {{-- <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li> --}}
                            </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="color: black";>
                            [{{ count($blogs->like) }}] Like
                        </div>
                        @foreach($blogs->like as $value)
                        {{-- @dd($value) --}}
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $value->user->First_name }}</li>
                        </ul>
                        @endforeach
                      </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('delete.post',$blogs->id)}}">Delete</a>
            </div>
        </div>
    </div>
@endsection

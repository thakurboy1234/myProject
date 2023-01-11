@extends('user_layout')
@section('content')
{{-- {{dd($cartCount);}} --}}
<!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                {{-- @dd($products) --}}
                {{-- @dd($cartCount)
                @if(in_array('3',$cartCount)){
                    @dd(11);
                }
                @endif --}}
                @foreach($products as $product)
                {{-- @dd($product) --}}
                <div class="col mb-5">
                    <div class="card h-100" >
                        <!-- Product image-->
                        <img class="card-img-top" src="{{asset('productImage/' . $product->image) }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$product->name}}</h5>
                                <!-- Product price-->
                                ₹{{$product->price}}
                            </div>
                        </div>

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                @auth

                                @if(empty($cartCount) || !in_array($product->id,$cartCount))
                                <div class="text-center" >
                                    <a class="btn btn-outline-dark mt-auto" id="add_button{{$product->id}}" onclick="addCart({{ $product->id }})">Add to Cart </a>
                                </div>
                                @else
                                <div class="text-center" >
                                    <a class="btn btn-outline-dark mt-auto" id="remove_button{{$product->id}}" onclick="removeCart({{ $product->id }})">Remove to cart </a>
                                </div>
                                @endif
                                @endauth
                            </div>

                        </div>
                    </div>
                    @endforeach
                {!! $products ->links() !!}
            </div>
        </div>

        <center>
            <h1>Blogs</h1>
        </center>
        <div class="card-group px-4 px-lg-5 mt-5">
            @foreach ($blogs as $blog)
                {{-- @dd(count($blog->like)); --}}
                {{-- @dd($blog) --}}
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <h2>{{$blog->user->First_name}}</h2>
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->discription }}</p>
                        <p class="card-text"><small class="text-muted">{{ $blog->updated_at }}</small></p>
                        {{-- <form action="{{route('like')}}" method="POST">
                            @csrf --}}
                        {{-- <input type = "hidden" name="blog_id{{$blog->id}}" class="blog_id" value="{{$blog->id}}"> --}}
                        {{-- <button type="submit" name="submit" style="color:rgb(35, 107, 241)"><i style="font-size:24px" class="fa">&#xf087;</i></button> --}}
                        @auth
                        <a class="like" onclick="Like({{ $blog->id }})"><i style="font-size:24px"
                                class="fa">&#xf087;</i></a>&nbsp;<span id="cityAjax_{{ $blog->id }}">{{ count($blog->like) }}</span>

                        {{-- </form> --}}
                        {{-- <a href="{{ route('blog_comment', $blog->id) }}"><i style="font-size:24px; color:black"
                                class="fa fa-comment"></i></a>&nbsp;{{ count($blog->comment) }} --}}

                        {{-- Modal --}}
                        <!-- Button trigger modal -->
                        <a data-toggle="modal" data-target="#exampleModal{{$blog->id}}">
                            <i style="font-size:24px; color:black" class="fa fa-comment"></i>
                        </a>&nbsp;<span id="countComment_{{ $blog->id }}">{{ count($blog->comment) }}</span>

                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$blog->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Write a comment here</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <input type="hidden" name="blog_id" value="{{ $blog->id }}"> --}}
                                            <div class="form-floating">
                                                <textarea class="comment_{{ $blog->id }}" name="comment" placeholder="Leave a comment here" id="floatingTextarea2"
                                                    style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="comment" onclick="Comment({{ $blog->id }})">Go</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-raper{{$blog->id}}">

                                @foreach ($blog->comment as $value)
                                <div class="card" id="commentCard{{$value->id}}" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $value->user->First_name }}</h5>
                                        {{-- <h6 class="card-subtitle mb-2 text-muted">{{$value->user_id}}</h6> --}}
                                        <p class="card-text">{{ $value->comment }}</p>
                                        <a href="#" class="card-link">Card link</a>
                                        {{-- <a href="#" class="card-link">Another link</a> --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endauth
                    </div>
                </div>
            @endforeach
            {{-- <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div> --}}
        </div>
    </section>
@endsection
@section('script')
    <script>
        // $(document).ready(function() {
        function Like(id) {
            // var id = $('.blog_id').val();
            // $('.like').on('click', function(event) {

            $.ajax({
                type: "GET",
                url: "{{ route('like') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function(data) {
                    $('#cityAjax_' + id).html(data.like);

                }

            });
        }
        // })
        function Comment(id){
            var comment= $('.comment_'+id ).val();

            $.ajax({
                type: "POST",
                url: "{{ route('store_comment') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "blog_id": id,
                    "comment":comment,
                },
                success: function(data) {
                    console.log(data.card);
                    $('.card-raper'+id).prepend(data.card);
                    $('#countComment_'+id).html(data.count);
                    $('.close').click();
                }

            });
        }

        function addCart(prod_id){
            $.ajax({
                type: "POST",
                url: "{{ route('addCart') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "prod_id": prod_id,

                },
                success: function(data) {
                    $('#add_button'+prod_id).parent().html(data.removeButton);
                    $('#countCart').html(data.count);

                }

            });
        }

        function removeCart(prod_id){
            $.ajax({
                type: "GET",
                url: "{{ route('removeCart') }}",
                data: {
                    "prod_id": prod_id,

                },
                success: function(data) {
                    $('#remove_button'+prod_id).parent().html(data.addButton);
                    console.log(data.message);

                }

            });
        }
    </script>
@endsection

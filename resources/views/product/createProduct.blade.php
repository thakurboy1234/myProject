@extends('user_layout')
@section('content')
    <div class="container" style="background-color: green">
        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group" >
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" name="productName" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Name">
            </div><br><br>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Price</label>
                <input type="price" class="form-control" name="productPrice" id="exampleInputPassword1" placeholder="Price">
            </div><br><br>
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control" name="productImage" type="file" id="formFile">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

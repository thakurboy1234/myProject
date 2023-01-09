@extends('Admin.layout.master')
@section('content')
    <div class="container" style="background-color: rgb(139, 146, 139)">
        <form method="POST" id="creatProduct" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group" >
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" name="productName" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Name">
            </div>
            <span style="color:red">
                @error('productName')
                    {{ $message }}
                @enderror
            </span>
            <br><br>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Price</label>
                <input type="price" class="form-control" name="productPrice" id="exampleInputPassword1" placeholder="Price">
            </div>
            <span style="color:red">
                @error('productPrice')
                    {{ $message }}
                @enderror
            </span>
            <br><br>
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control" name="productImage" type="file" id="formFile">
            </div><span style="color:red">
                @error('productImage')
                    {{ $message }}
                @enderror
            </span><br>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#createProduct").validate({
                rules: {
                    productName: {
                        required: true,
                        maxlength: 50
                    },
                    productPrice: {
                        required: true,
                    },
                    productImage: {
                        required: true,
                    },

                },
                messages: {
                    productName: {
                        required: "Please enter product Name",
                    },
                    productPrice: {
                        required: "Please enter product Price",
                    },
                    productImage: {
                        required: "Please select a product Image",
                    },
                },
            });
        })
    </script>
@endsection

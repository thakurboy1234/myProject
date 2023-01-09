@extends('Admin.layout.master')
@section('content')
<<<<<<< HEAD
    <div class="container" style="background-color: green">
        <form method="POST" id="createProduct" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
=======
    <div class="container" style="background-color: rgb(139, 146, 139)">
        <form method="POST" id="creatProduct" action="{{route('product.store')}}" enctype="multipart/form-data">
>>>>>>> 388901ad394a90c1c4cb11d9383bff182eb7a157
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
<<<<<<< HEAD
            </div><span style="color:red">
                @error('productImage')
                    {{ $message }}
                @enderror
            </span><br>

=======
            </div>
            <span style="color:red">
                @error('productImage')
                    {{ $message }}
                @enderror
            </span>
>>>>>>> 388901ad394a90c1c4cb11d9383bff182eb7a157
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('script')
<<<<<<< HEAD
    <script>
        $(document).ready(function(){
            $("#createProduct").validate({
=======
<script>
    $(document).ready(function(){
        $("#creatProduct").validate({
>>>>>>> 388901ad394a90c1c4cb11d9383bff182eb7a157
                rules: {
                    productName: {
                        required: true,
                        maxlength: 50
                    },
<<<<<<< HEAD
                    productPrice: {
                        required: true,
                    },
                    productImage: {
=======
                    ProductPrice: {
                        required: true,
                        regex: /^\d+(\.\d{1,2})?$/
                    },
                    productImage:{
>>>>>>> 388901ad394a90c1c4cb11d9383bff182eb7a157
                        required: true,
                    },

                },
                messages: {
                    productName: {
<<<<<<< HEAD
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
=======
                        required: "Please enter Product name",
                    },
                    ProductPrice: {
                        required: "Please enter Product Price",
                    },
                    productImage: {
                        required: "Please select Image",
                    },
                },
            });
    })
</script>
>>>>>>> 388901ad394a90c1c4cb11d9383bff182eb7a157
@endsection

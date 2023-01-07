@extends('user_layout')
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
            </div>
            <span style="color:red">
                @error('productImage')
                    {{ $message }}
                @enderror
            </span>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#creatProduct").validate({
                rules: {
                    productName: {
                        required: true,
                        maxlength: 50
                    },
                    ProductPrice: {
                        required: true,
                        regex: /^\d+(\.\d{1,2})?$/
                    },
                    productImage:{
                        required: true,
                    },

                },
                messages: {
                    productName: {
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
@endsection

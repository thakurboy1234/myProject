@extends('Admin.layout.master')
@section('content')
    <div class="container" style="background-color: green; text-align: -webkit-center;">
        <form method="post" id="editProduct" action="{{route('admin.product.update')}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            {{-- @dd($product) --}}
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="col-xl-6 d-none d-xl-block text-center">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Product</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img style="width: 300px" class="img-account-profile rounded-circle mb-2"
                            src="{{ asset('productImage/' . $product->image) }}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input class="form-control" name="productImage" type="file" id="formFile">
                        </div>
                        <span style="color:red">
                            @error('productImage')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" name="productName" value="{{ $product->name }}"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                        </div>
                        <span style="color:red">
                            @error('productName')
                                {{ $message }}
                            @enderror
                        </span>
                        <br><br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Price</label>
                            <input type="price" class="form-control" name="productPrice" value="{{ $product->price }}"
                                id="exampleInputPassword1" placeholder="Price">
                        </div>
                        <span style="color:red">
                            @error('productPrice')
                                {{ $message }}
                            @enderror
                        </span>
                        <br><br>

                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        <!-- Profile picture upload button-->
                        {{-- <button class="btn btn-primary" type="button">Upload new image</button> --}}
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#editProduct").validate({
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

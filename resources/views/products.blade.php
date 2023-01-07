@extends('user_layout')
@section('content')
<div class="container">
    <table class="table table-sm table-light">
        <div class="w3-bar">
            <h2 class="w3-button w3-left" >Product Table</h2>
            <button class="w3-button w3-green w3-right"><a href="{{route('product.form')}}">add</a> </button>
        </div>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productData as $key => $data)
            {{-- @dd($data->image) --}}
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->price}}</td>
                <td>
                    <img src="{{ asset('productImage/'.$data->image) }}" height="50px" width="50px">
                </td>
                <td>
                    <a href="{{route('product.edit',$data->id)}}"><i class='far fa-edit' style='font-size:24px; color:rgb(31, 177, 203)'></i></a>&nbsp;&nbsp;
                    <a href=""><i class='fas fa-trash-alt' style='font-size:18px;color:red'></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

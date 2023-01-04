@extends('user_layout')
@section('content')
<div class="container">
    <table class="table table-sm table-dark">
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
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

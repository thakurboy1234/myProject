@extends('Admin.layout.master')
@section('content')
    <div class="container">
        <table class="table table-sm table-light">
            <div class="w3-bar">
                <h2 class="w3-button w3-left">Product Table</h2>
                <button class="w3-button w3-green w3-right"><a href="{{ route('admin.product.form') }}">add</a> </button>
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
                @foreach ($productData as $key => $data)
                    {{-- @dd($data->image) --}}
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->price }}</td>
                        <td>
                            <img src="{{ asset('productImage/' . $data->image) }}" height="50px" width="50px">
                        </td>
                        <td>
                            <a href="{{ route('admin.product.edit', $data->id) }}"><i class='far fa-edit'
                                    style='font-size:24px; color:rgb(31, 177, 203)'></i></a>&nbsp;&nbsp;
                            {{-- <a href=""><i class='fas fa-trash-alt' style='font-size:18px;color:red'></i></a> --}}
                            <!-- Small modal -->
                            <a class="" data-toggle="modal" data-target="#deleteData{{ $data->id}}"><i
                                    class='fas fa-trash-alt' style='font-size:18px;color:red'></i></a>

                            <div class="modal fade bd-example-modal-sm" id="deleteData{{ $data->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm " role="document">
                                    <div class="modal-content"
                                        style="text-align:center; background-color: rgb(143, 149, 148)">
                                        <div class="modal-header" style="background-color: red; height: 9px">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div><br>
                                        Are you sure you want to delete
                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-secondary" onclick="productDelete({{$data->id }})">Yes</button>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        function productDelete(id) {
            console.log(id);

            $.ajax({
                type: "GET",
                url: "{{ route('admin.product.delete') }}",
                data: {
                    "id": id,
                },
                success: function(data) {
                    alert(data.messege)

                }

            });
        }
    </script>
@endsection

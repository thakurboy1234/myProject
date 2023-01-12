@extends('Admin.layout.master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Products
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#datatablesSimple').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax:{
                url:"{{ route('admin.users-data') }}",

                },
                processing: true,
                serverSide: true,
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'price' },
                    { data: 'image',render: function( data, type, full, meta ) {
                        return "<img src=\"" + data + "\" height=\"50\"  align=\"center\"/>";
                        }
                    },
                    {data: 'action', orderable: false, searchable: false},
                ],

            });
        });
    </script>
    <script>
        function productDelete(id) {
            console.log(id);

            $.ajax({
                type: "DELETE",
                url: "{{ route('admin.product.delete') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function(data) {
                    $('.btn-close').click();
                    alert(data.messege)


                }

            });
        }
    </script>
@endsection

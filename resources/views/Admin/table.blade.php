@extends('Admin.layout.master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
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

            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#datatablesSimple').dataTable({
                processing: true,
                serverSide: true,

                ajax:{
                    url:"{{ route('admin.users-data') }}",

                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'price' },
                    { data: 'image',render: function( data, type, full, meta ) {
                        return "<img src=\"" + data + "\" height=\"50\"  align=\"center\"/>";
                        }
                    },
                    {data: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection

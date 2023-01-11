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
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#datatablesSimple').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 0, "desc" ]],
                ajax:{
                    url:"{{ route('admin.users-data') }}",
                    dataSrc: 'allk'
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'price' },
                    { data: 'image' },
                ]
            });
        });
    </script>
@endsection

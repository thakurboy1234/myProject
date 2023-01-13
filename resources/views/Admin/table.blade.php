@extends('Admin.layout.master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Products
        </div>
        <div class="card-body">
            <label for="amount">Amount</label>
            <input type="number" id="startPrice"  placeholder="Search for names..">
            <label for="amount">to</label>
            <input type="number" id="endPrice"   placeholder="Search for names..">
            <button class="amountFilter">check</button>
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
        $(document).ready(function() {

            var table = $('#datatablesSimple').DataTable({

                ajax: {
                    type:"GET",
                    url: "{{ route('admin.users-data') }}",
                    data: function(d) {
                        // read start date from the element
                        d.from = $('#startPrice').val()
                        // read end date from the element
                        d.to = $('#endDate').val();
                    }
                },

                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'image',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height=\"50\"  align=\"center\"/>";
                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });

            $('.amountFilter').on('click', function() {
                from = $('#startPrice').val()
                to = $('#endDate').val();
                if(from && to){
                    table.draw();
                }
            });
        });
    </script>





    <script>
        function productDelete(id) {

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

<a href="{{ route('admin.product.edit', $data->id)}}"><i class='far fa-edit' style='font-size:24px; color:rgb(31, 177, 203)'></i></a>

        &nbsp;&nbsp;

 <a class='' data-bs-toggle='modal' data-bs-target='#exampleModal{{$data->id}}'><i class='fas fa-trash-alt' style='font-size:18px;color:red'></i></a>



{{-- Delete Modal --}}
<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: brown">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align:center">
                <h6>Are you sure you want to delete this record?</h6>
            </div>
            <div class="modal-footer" style="background-color: dimgray">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_btn" onclick="productDelete({{$data->id }})">Yes</button>
            </div>
        </div>
    </div>
</div>

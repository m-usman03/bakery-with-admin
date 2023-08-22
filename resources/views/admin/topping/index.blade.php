@extends("admin.layout.master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card dz-card">
                <div class="card-header flex-wrap">
                    <div>
                        <h4 class="card-title">Topping</h4>                                   
                    </div>
                    <a href="{{ route('admin.topping.create') }}"><button class="btn btn-primary">Create Topping</button></a>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="topping" class="display table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>                                
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script>
    var table = $('#topping').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.topping.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'edit',
                name: 'edit',
                orderable: false,
                searchable: false
            },
            {
                data: 'delete',                    
                name: 'delete',                    
                orderable: false,                    
                searchable: false
            },
        ]
    });

    $(document).on('click', '.delete-topping', function() {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/topping/' + $(this).data('id'),
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            toastr.success(data.message);
                            table.ajax.reload();
                        }
                    },
                    error: function(data) {
                        toastr.error(data.message);
                    }
                });
            }
        });
    })
</script>
@endsection

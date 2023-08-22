@extends("admin.layout.master")
@section("content")
<div class="container">

    <!-- row -->
   
            <div class="container">
                <div class="row">
                    <!-- Column starts -->
                    <div class="col-xl-12">
                        <div class="card dz-card">
                            <div class="card-header flex-wrap">
                                <div>
                                    <h4 class="card-title">Product</h4>                                   
                                </div>
                                <a href="{{route('admin.product.create')}}"><button class="btn btn-primary">Create Product</button></a>
                            </div>
                            <!--tab-content-->
                      
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table id="product" class="display table">
                                                <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Thumbnail</th>                                
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                                </thead>
                                              
                                            </table>
                                      
                                    <!-- /Default accordion -->
                                </div>
                                
                            <!--/tab-content-->
                        </div>
                    </div>
                </div>
                <!-- Column ends -->
                <!-- Column starts -->
               
                <!-- Column ends -->
                <!-- Column starts -->
                
             
           
     
    </div>
</div>
@endsection
@section("scripts")
<script>     
        var table = $('#product').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.product.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'thumbnail',
                    name: 'thumbnail'
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
       
            $(document).on('click', '.delete-product', function() {
                event.preventDefault();
                Swal.fire();
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
                            url: '/admin/product/' + $(this).data('id'),
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
                })

            })
      
       
    </script>
@endsection
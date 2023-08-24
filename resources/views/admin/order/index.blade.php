@extends("admin.layout.master")
@section("content")
<div class="container">
    <div class="col-xl-12">
        <div class="card dz-card">
            <div class="card-header flex-wrap">
                <div>
                    <h4 class="card-title">Orders</h4>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table id="orders" class="display table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                                <th>View</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script>
    var table = $('#orders').DataTable({
        processing: true,
        serverSide: true,
        "searching":false,
        ajax: "{{ route('admin.order.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'customer_name', name: 'customer_name' },
            { data: 'total', name: 'total' },
            { data: 'view', name: 'view', orderable: false, searchable: false }
        ]
    });
</script>
@endsection

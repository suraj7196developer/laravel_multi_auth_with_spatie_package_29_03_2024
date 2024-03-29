@section('title') 
Customers
@endsection 
@extends('admin.layouts.main')
@section('style')
<style>
    h1 {
        color:Green;
    }
    div.gfg {
        margin:5px;
        padding:5px;
        background-color: green;
        width: 500px;
        height: 110px;
        overflow: auto;
        text-align:justify;
    }
</style>
@endsection 
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-7 align-self-center">
            <div class="d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 align-self-center text-end">
            <a href="{{url('/admin/customers/add')}}"><button class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-info"><i class="fa fa-plus-circle"></i> Add New</button></a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Export</h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="table display table-striped border no-wrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Postal Code</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                    <th>
                                        <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Postal Code</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                    <th>
                                        <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
                                    </th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
            <!-- table responsive -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
@endsection 
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example23').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "responsive": true,
            "lengthMenu": [[10, 500, 1000, -1], [10, 500, 1000, "All"]],
            "pageLength": 10,
            "dom": "Blfrtip",
            "ajax": "{{ route('customers.getdata') }}",
            "columns":[
            { "data": "CustomerName", "name": "CustomerName" },
            { "data": "Address", "name": "Address", render:function (data, type, row, meta){return fn(data, 25);}},
            { "data": "City", "name": "City" },
            { "data": "PostalCode", "name": "PostalCode" },
            { "data": "Country", "name": "Country" },
            { "data": "action", "name": "action", orderable:false, searchable: false},
            { "data": "checkbox", "name": "checkbox", orderable:false, searchable:false},
            ],
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
        function fn(Address, count) { return Address.slice(0, count) + (Address.length > count ? "..." : ""); }
    });
</script>
<script language="javascript">
    function showscroll() {
        document.body.style.overflow = 'scroll';
    }
</script>
@endsection
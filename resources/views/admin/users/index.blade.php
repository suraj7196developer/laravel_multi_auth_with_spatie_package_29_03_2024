@section('title') 
Users
@endsection 
@extends('admin.layouts.main')
@section('style')

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
            <a href="{{url('admin/users/add')}}"><button class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-info"><i class="fa fa-plus-circle"></i> Add New</button></a>
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
                	<div class="table-responsive m-t-40">
                		<table id="example23" class="display nowrap table table-hover table-striped border" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Number</th>
                           <th>Role</th>
                           <th>Siep</th>
                           <th>Edit</th>
                           <th>Delete</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Number</th>
                           <th>Role</th>
                           <th>Siep</th>
                           <th>Edit</th>
                           <th>Delete</th>
                        </tr>
                     </tfoot>
                     
                  </table>
                	</div>
                </div>
            </div>
        </div>
    </div>
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
            "ajax": "{{ route('users.getdata') }}",
            "columns":[
            { "data": "name" },
            { "data": "email"},
            { "data": "number" },
            { "data": "role" },
            { "data": "siep" },
            { "data": "edit", "name": "Edit", orderable:false, searchable: false},
            { "data": "delete", "name": "Delete", orderable:false, searchable:false},
            ],
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });
</script>
<script language="javascript">
    function showscroll() {
        document.body.style.overflow = 'scroll';
    }
</script>
@endsection
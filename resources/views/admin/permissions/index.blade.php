@section('title') 
Permissions
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
            <a href="{{url('/admin/permission-create')}}"><button class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-info"><i class="fa fa-plus-circle"></i> Add New</button></a>
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
                    <h4 class="card-title">All Permissions</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Role Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Role Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php($i=1)
                            @foreach($permissions as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->role->name}}</td>
                                <td>
                                    @if($item->status == 1)
                                    <a href="{{route('inactive.permission',$item->id)}}" title="click to inactive"><span class="badge bg-success">Active</span></a>
                                    @else
                                    <a href="{{route('active.permission',$item->id)}}" title="click to active"><span class="badge bg-warning">In Active</span></a>
                                    @endif
                                </td>
                                <td><div class="button-list">
                                    <a href="{{route('edit.permission',$item->id)}}"><button type="button" class="btn btn-rounded btn-info">Edit</button></a>
                                    <a href="{{route('delete.permission',$item->id)}}" id="delete"><button type="button" class="btn btn-rounded btn-danger">Delete</button></a>
                                </div></td>
                            </tr>
                            @endforeach
                        </tbody>
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
<script>
    $(function () {
        $('#example23').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
    });

</script>
@endsection
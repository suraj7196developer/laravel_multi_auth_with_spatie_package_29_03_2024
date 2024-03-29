@section('title') 
Roles
@endsection 
@extends('userdashboard.layouts.main')
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
         @can('Role create')
         <a href="{{route('admin.roles.create')}}"><button class="btn waves-effect waves-light btn-rounded m-l-15 text-white btn-xs btn-info"><i class="fa fa-plus-circle"></i> Add New</button></a>
         @endcan
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
                  <table id="example23" class="display nowrap table table-hover table-striped border" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Sl No</th>
                           <th>Role Name</th>
                           <th>Permissions</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Sl No</th>
                           <th>Role Name</th>
                           <th>Permissions</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        @php($i=1)
                        @can('Role access')
                        @foreach($roles as $role)
                        <tr>
                           <td>{{$i++}}</td>
                           <td>{{$role->name}}</td>
                           <td>
                              @foreach($role->permissions as $permission)<span class="badge rounded-pill bg-success">{{ $permission->name }}</span>@endforeach
                           </td>
                           <td>
                              <div class="button-list">
                                 @can('Role edit')
                                 <a href="{{route('admin.roles.edit',$role->id)}}"><button type="button" class="btn btn-rounded btn-info">Edit</button></a>
                                 @endcan
                                 
                                 @can('Role delete')
                          <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-rounded btn-danger">Delete</button>
                          </form>
                          @endcan
                              </div>
                           </td>
                        </tr>
                        @endforeach
                        @endcan
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
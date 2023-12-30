@extends('layouts.main')
@section('content')
<section class="main-content">
<div class="col-md-12">
    <div class="panel panel-primary">
       <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6 text-left">Admin</div>
            {{-- <div class="col-xs-6 text-right"> <a href="addadmin" class="btn btn-info">Add admin</a></div> --}}
          </div>
    </div>
        <div class="panel-body">
           <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Action</th> 

                    </tr>
                    
                </thead>
                 <tbody>        
                    @foreach($admin as $adm)        
            <tr>
                <td>{{$adm->id}}</td>
                <td>{{$adm->username}}</td>
                <td>{{$adm->name}}</td>               
                 <td>
                    <a href='{{ route('editadmin', ['id' => $adm->id]) }}'
                        class="btn btn-info btn-sm"><i class="fas fa-edit"></i>
                    </a>
                 </td>
             </tr>
                @endforeach
                 </tbody>
           
           </table>
        </div>
     </div>
</<section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js"></script>
<script src="js/index.js"></script>
<script type="text/javascript">
$(document).ready(function () {
 $('#example').dataTable();
});
 
  $(document).ready(function () {
    $('#example').dataTable();

      @if(Session::has('success'))
          toastr.options = {
              "closeButton": true,
              "timeOut": 3000  
          };
          toastr.success("{{ session('success') }}");
      @endif

    
      @if(Session::has('error'))
          toastr.options = {
              "closeButton": true,
              "timeOut": 3000  
          };
          toastr.error("{{ session('error') }}");
      @endif
  });
</script>

    
@endsection
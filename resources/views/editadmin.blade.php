@extends('layouts.main')
@section('content')

<section class="main-content">
    <div class="col-md-12">
        <div class="panel panel-primary">
           <div class="panel-heading text-left">Edit admin</div>
           <div class="panel-body">
              <form class="form-horizontal col-md-offset-3" method="POST" action="saveeditadmin">
                @csrf
                 <input type="hidden" value="{{$admin->id}}" name="id">
                 <div class="form-group text-center">
                    <label class="control-label col-sm-2" >Username:</label>
                    <div class="col-sm-6">
                       <input type="text" readonly class="form-control" id="username" value="{{$admin->username}}" placeholder="Enter Your Username" name="username" required>
                    </div>
                 </div>
  
                 <div class="form-group">
                   <label class="control-label col-sm-2" for="pwd">Password: </label>
                   <div class="col-sm-6 pass">          
                      <input type="password" class="form-control" value="{{$admin->password}}" name="password" id="pwd" placeholder="Enter password">
                      <span class="eye" onclick="showpass('pwd')">
                        <i class="fa-solid fa-eye-slash"></i>
                      </span>
                   </div>
                </div>
                
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Name:</label>
                    <div class="col-sm-6">          
                       <input type="text" class="form-control"  name="name" value="{{$admin->name}}" placeholder="Enter Name"  required>
                    </div>
                 </div>
                
             
                              <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2 ">
                       <input type="submit" name="submit" class="btn btn-info" value="Submit">
                     </div>
                 </div>
                 
              </form>
           </div>
        </div>
</section>
    
@endsection
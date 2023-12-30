@extends('layouts.main')
@section('content')
 <section class="main-content">
    <div class="col-md-12">
       <div class="panel panel-primary">
          <div class="panel-heading text-left">Edit User</div>
          <div class="panel-body">
             <form class="form-horizontal col-md-offset-3" method="POST" action="saveedituser">
               @csrf
               <input type="hidden" name="id" value="{{$user->id}}">
                               
                <div class="form-group">
                  <label class="control-label col-sm-2">Firstname: </label>
                  <div class="col-sm-6 ">          
                     <input type="text" class="form-control" value="{{$user->firstname}}" name="firstname" placeholder="Enter First name">
                      </span>
                  </div>
               </div>
                
                <div class="form-group">
                   <label class="control-label col-sm-2" for="">Last Name:</label>
                   <div class="col-sm-6">          
                      <input type="text" class="form-control" value="{{$user->lastname}}"  name="lastname" placeholder="Enter Last Name"  required>
                   </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Username:</label>
                    <div class="col-sm-6">
                       <input type="text"  value="{{$user->username}}" class="form-control" id="username" value="" placeholder="Enter Your Username" name="username" required>
                    </div>
                 </div>
 

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Password: </label>
                  <div class="col-sm-6 pass">          
                     <input type="password" class="form-control" value="{{$user->password}}" name="password" id="pwd" placeholder="Enter password">
                     <span class="eye" onclick="showpass('pwd')">
                       <i class="fa-solid fa-eye-slash"></i>
                     </span>
                  </div>
               </div>


                <div class="form-group">
                   <label class="control-label col-sm-2" for="pwd">Phone Number:</label>
                   <div class="col-sm-6">          
                      <input type="text" class="form-control" value="{{$user->phone}}" name="phno" placeholder="Enter Mobile No."  required>
                   </div>
                </div>

                <div class="form-group">
                   <label class="control-label col-sm-2" for="pwd">Date Of birth:</label>
                   <div class="col-sm-6">          
                      <input type="date" class="form-control" value="{{$user->dob}}" name="dob" placeholder="Enter Date Of Birth"  required>
                   </div>
                </div>
            
                                  <div class="form-group">
                   <label class="control-label col-sm-2" >Select gender:</label>
                   <div class="col-sm-6">
                      <select  class="form-control" id="" required name="gender">
                         <option value="">Select Gender</option>
                         <option value="male" @if($user->gender == "male") selected @endif>Male</option>
                         <option value="female" @if($user->gender == "female") selected @endif>Female</option>
                         <option value="other" @if($user->gender == "other") selected @endif>Other</option>
                      </select>
                   </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-sm-2" name="type" >User Type:</label>
                   <div class="col-sm-6">
                      <select name="type" class="form-control" id="" required  name="type">
                         <option value="">Select User Type</option>
                         <option value="account" @if($user->utype == 'account') selected @endif>Account</option>
                         <option value="complain" @if($user->utype == 'complain') selected @endif>Complain</option>
                         <option value="employee" @if($user->utype == 'employee') selected @endif>Employee</option>
                      </select>
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
<section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js"></script>
<script src="js/index.js"></script>
@endsection   
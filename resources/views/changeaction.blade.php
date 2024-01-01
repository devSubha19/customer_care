@extends('layouts.facebox')
@section('content')

<h2 style="text-align: center"><u>Actions</u></h2>
<hr>
 
    <div class="col-md-12">
        <form action="savechangeaction" method="POST">
            @csrf

            @if(isset($flag) && $flag)
                <input type="hidden" value="{{$flag}}" name="flag">
            @endif
            <input type="hidden" value="{{$call_about}}" name="call_about">
            <input type="hidden" value="{{$id}}" name="id">
            <div class="forminp">
                <label for="" style="text-align: center">change Status:</label>
                <br>
                <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option @if($status == 'open') selected @endif value="open">Open</option>
                        <option @if($status == 'ongoing') selected @endif value="ongoing">Ongoing</option>hidden
                        <option @if($status == 'close') selected @endif value="close">Close</option>
                </select>
            </div>

            <div class="forminp">
                <label for="" style="text-align: center">Your Remarks:</label>
                <br>
                <textarea name="remarks" id="" name="remarks">@if(isset($remarks)) {{$remarks}} @else @endif</textarea>
            </div>
            <div class="forminp">
            <center> <input type="submit" name="submit" class="btn btn-info text-center sub" value="Submit"></center>
            </div>
         </form>
    </div>
 
@endsection

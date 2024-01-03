@extends('layouts.main')
@section('content')

    <head>
        <link rel="stylesheet" href="src/facebox.css">
        <script src="src/facebox.js"></script>
    </head>

    <section class="main-content">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 text-left">Complaints(open)</div>
                        
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <style>td,th{ text-align: center}</style>
                            <tr>
                                <th>Emp name</th>
                                <th>Calling Number</th>
                                <th>Registered Number</th>
                                <th>Issue</th>
                                <th>Customer Remarks</th>
                                <th>Complaints Remark</th>
                                <th>Status</th>
                                <td>date</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($var as $ac)
                            <tr>
                                <td>
                                    @php
                                    $emp = App\Models\usertab::find($ac->employee);
                                    $name = $emp->firstname . ' ' . $emp->lastname;
                                    $call_about = 'Complaints';
                                @endphp
                                {{ $name }}
                                </td>
                                <td>{{$ac->calling_number}}</td>
                                <td>{{$ac->reg_num}}</td>
                                <td>{{$ac->issue}}</td>
                                <td>{{$ac->remarks}}</td>
                                <td>{{$ac->complaint_remarks}} <br><br>
                                    @if($ac->complaint_emp != null)
                                    @php
                                        $upby = App\Models\usertab::find($ac->complaint_emp);
                                        echo "
                                        <span style='color:blueviolet'>
                                            <b>Updated By: </b>$upby->firstname $upby->lastname <b><br>at ".\Carbon\Carbon::parse($ac->complaint_updated_at)->format('h:i A') ."</b></span> ";
                                            @endphp 
                                            @else
                                                <font color"red">Not Reviewed by anyone yet</font>
                                                @endif 
                                            </td>
                                            
                                <td>{{$ac->status}}</td>
                                <td>{{ \Carbon\Carbon::parse($ac->created_at)->toDateString() }}</td>

                                <td> <a href="{{ route('changeaction', ['call_about' => $call_about, 'id' => $ac->id]) }}"
                                    rel="facebox">
                                    <i class="fa-solid fa-hand-pointer" style="font-size: 2rem"></i>
                                </a></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
    </section>
@endsection

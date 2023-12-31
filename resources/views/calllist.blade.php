@extends('layouts.main')
@section('content')
<head>
    <link rel="stylesheet" href="src/facebox.css">
<script src="src/facebox.js"></script>
</head>
    <section class="main-content">
        <form action={{ route('calllist') }} method="GET">
            <div class="form-group col-md-12" style="display: flex; gap: 2rem;">
                <input type="text" name="fromDate" class="form-control" placeholder="From Date" value=""
                    onfocus="(this.type='date')" onblur="(this.type='text')" name="fromdate">

                <input type="text" name="toDate" class="form-control" placeholder="To Date" onfocus="(this.type='date')"
                    onblur="(this.type='text')" name="toDate">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="col-md-12">
             <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 text-left">Complaints</div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Call About</th>
                                <th>Customer Name</th>
                                <th>Calling Number</th>
                                <th>Registered Number</th>
                                <th>issue</th>
                                <th>Remarks</th>
                                <th>Open date</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $row)
                                <tr>
                                    <td><a href="{{route('show_rem_emp', ['call_about' => $row->call_about, 'id' => $row->id ])}}" rel="facebox">{{ $row->call_about }}</a></td>
                                    <td>{{ $row->customer_name }}</td>
                                    <td>{{ $row->calling_number }}</td>
                                    <td>{{ $row->reg_num }}</td>
                                    <td>{{ $row->issue }}</td>
                                    <td>{{ $row->remarks }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
                                    <td>{{$row->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

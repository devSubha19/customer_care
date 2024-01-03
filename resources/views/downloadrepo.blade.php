@extends('layouts.main')
@section('content')

    <head>
        <link rel="stylesheet" href="src/facebox.css">
        <script src="src/facebox.js"></script>
        <style>
            body.facebox {
    font-family: 'Arial', sans-serif;
}

#facebox {
    background-color: #333;
    color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

#facebox h2 {
    font-size: 2em;
    border-bottom: 1px solid #555;
    padding-bottom: 10px;
}

#facebox div.content {
    padding: 20px;
}

#facebox a.close {
    color: #fff;
    font-size: 1.5em;
    position: absolute;
    top: 10px;
    right: 10px;
}

#facebox a.close:hover {
    color: #ccc;
}

#facebox_overlay {
    background-color: rgba(0, 0, 0, 0.5);
}

#facebox table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

#facebox th, #facebox td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

#facebox th {
    background-color: #3498db;
    color: #fff;
}

#facebox tr:nth-child(even) {
    background-color: #f8f9fa;
}

#facebox tr:hover {
    background-color: #e0e0e0;
}

#facebox div.content {
    padding: 20px;
    border-radius: 8px;
    background-color: #ffffff;  
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    line-height: 1.8;
}


        </style>
    </head>

    <section class="main-content">
        <form action={{ route('downloadrepo') }} method="GET">
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
                        <div class="col-xs-6 text-left">Download Report</div>
                        @php $serializeArray = serialize($result) @endphp
                        <div class="col-xs-6 text-right"> <a href="{{route('download', ['result' => $serializeArray])}}" class="btn btn-info">Download <i
                                    class="fas fa-download"></i></a></div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Emp name</th>
                                <th>Calling Number</th>
                                <th>Registered Number</th>
                                <th>Call Type</th>
                                <th>Issue</th>
                                <th>customer Remarks</th>
                                <th>Status</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $repo)
                                <tr>
                                    <td>
                                        @php
                                            $emp = App\Models\usertab::find($repo->employee);
                                            $name = $emp->firstname . ' ' . $emp->lastname;
                                        @endphp
                                        {{ $name }}
                                    </td>
                                    <td>{{ $repo->calling_number }}</td>
                                    <td>{{ $repo->reg_num }}</td>
                                    <td>
                                        @if ($repo->call_about == 'Accounts')
                                        <a href="{{ route('seetype', ['call_about' => $repo->call_about, 'id' => $repo->id]) }}"
                                            rel="facebox">
                                                {{ $repo->call_about }}
                                            </a>
                                        @elseif($repo->call_about == 'Complaints')
                                        <a href="{{ route('seetype', ['call_about' => $repo->call_about, 'id' => $repo->id]) }}"
                                            rel="facebox">
                                                {{$repo->call_about}}
                                            </a>
                                        @elseif($repo->call_about == 'General Query')
                                        <a rel="facebox" href="{{ route('seetype', ['call_about' => $repo->call_about, 'id' => $repo->id]) }}">
                                            {{$repo->call_about}}
                                        </a>
                                        @else
                                        <a rel="facebox" href="{{ route('seetype', ['call_about' => $repo->call_about, 'id' => $repo->id]) }}">
                                            {{$repo->call_about}}
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($repo->issue)
                                            {{ $repo->issue }}
                                        @else
                                            ----- @endif
                                    </td>
                                    <td>{{ $repo->remarks }}</td>
                                    <td>{{ $repo->status }}</td>
                                    <td>{{ \Carbon\Carbon::parse($repo->created_at)->toDateString() }}</td>
                                    <td>
                                        <a href="{{ route('changeaction', ['call_about' => $repo->call_about, 'id' => $repo->id]) }}"
                                            rel="facebox">
                                            <i class="fa-solid fa-hand-pointer" style="font-size: 2rem"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
    </section>
@endsection

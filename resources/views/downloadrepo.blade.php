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
                        <div class="col-xs-6 text-left">Download Report</div>
                        <div class="col-xs-6 text-right"> <a href="download" class="btn btn-info">Download <i
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
                                <th>Remark</th>
                                <th>Status</th>
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
                                        @else
                                            {{$repo->call_about}}
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

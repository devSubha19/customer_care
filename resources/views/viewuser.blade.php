@extends('layouts.main')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">

    </head>

    <section class="main-content">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 text-left">User</div>
                        <div class="col-xs-6 text-right"> <a href="adduser" class="btn btn-info">Add User</a></div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>User Type</th>
                                <th>Gender</th>
                                <th>Dob</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->utype }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->dob }}</td>

                                    <td>
                                        @if ($user->status == 0)
                                            <a href="{{ route('banuser', ['id' => $user->id, 'status' => $user->status]) }}"
                                                class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i></a>
                                        @else
                                            <a href="{{ route('banuser', ['id' => $user->id, 'status' => $user->status]) }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href='{{ route('edituser', ['id' => $user->id]) }}'
                                            class="btn btn-info btn-sm"><i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js"></script>
    <script src="js/index.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
@endsection

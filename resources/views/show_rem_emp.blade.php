@extends('layouts.facebox')
@section('content')
<div class="col-md-12">
    <h2 style="text-align: center"><u>Remarks</u></h2>
    <style>
        #faceb th,
        #faceb td {
            padding: 1rem;
            border: 2px solid black;
            text-align: center;
            color: black;
        }

        #faceb table {
            width: 50vw;
        }
    </style>
    <center>
        <div id= "faceb" style="margin:2rem;">
            <table>
                <thead>
                    <th>admin remarks</th>
                    @if ($call_about == 'Accounts')
                        <th>Accounts remarks</th>
                    @elseif($call_about == 'Complaints')
                        <th>Complaints Remarks</th>
                    @else
                    @endif
                </thead>
                <tbody>
                    @if ($call_about == 'Accounts')
                        <td>{{ $ac_admin_rem }}</td>
                        <td>{{ $ac_remarks }}</td>
                    @elseif($call_about == 'Complaints')
                        <td>{{ $cmp_admin_rem }}</td>
                        <td>{{ $cmp_remarks }}</td>
                    @elseif($call_about == 'General Query')
                        <td>{{ $gqry_admin_rem }}</td>
                    @else
                        <td>{{ $others_admin_rem }}</td>
                    @endif
                </tbody>
            </table>
        </div>
    </center>
</div>
@endsection

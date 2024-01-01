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
                    @if($call_about == 'Accounts' || $call_about == 'Complaints')
                    <th>Your Remarks</th>
                    <th>{{$call_about}} remarks</th>
                    <th>{{$call_about}} remarks by</th>
                    @else
                    <th>Your Remarks</th>
                    @endif
                </thead>
                <tbody>
                    @php 
                        if($call_about == 'Accounts'){
                            $ac = App\Models\accounts_call::find($id);
                            $ac_emp = App\Models\usertab::find($ac->accounts_emp);
                            $remarks = $ac->accounts_remarks;
                            $admin_remarks = $ac->admin_remarks;
                            $updated_at = $ac->account_updated_at;
                            if($ac_emp){
                                $name = $ac_emp->firstname." ".$ac_emp->lastname;
                            }
                        }elseif($call_about == 'Complaints'){
                            $ac = App\Models\complaint_call::find($id);
                            $ac_emp = App\Models\usertab::find($ac->complaint_emp);
                            $remarks = $ac->complaint_remarks;
                            $admin_remarks = $ac->admin_remarks;
                            $updated_at = $ac->complaint_updated_at;
                            if($ac_emp){
                                $name = $ac_emp->firstname." ".$ac_emp->lastname;
                            }
                        }elseif($call_about == 'General Query'){
                            $ac = App\Models\general_query::find($id);
                            $ac_emp = App\Models\usertab::find($ac->complaint_emp);
                            $admin_remarks = $ac->admin_remarks;
                            if($ac_emp){
                                $name = $ac_emp->firstname." ".$ac_emp->lastname;
                            }
                        }
                        else{
                            $ac = App\Models\others_call::find($id);
                            $ac_emp = App\Models\usertab::find($ac->complaint_emp);
                            $admin_remarks = $ac->admin_remarks;
                            if($ac_emp){
                                $name = $ac_emp->firstname." ".$ac_emp->lastname;
                            }
                        }
                    @endphp
                    @if($call_about == 'Accounts' || $call_about == 'Complaints')
                    <td>@if(isset($admin_remarks)){{$admin_remarks}}@else  @endif</td>
                    <td>@if(isset($remarks)){{$remarks}}@else @endif </td>
                    <td>@if(isset($name)){{$name}} <br><br>
                        {{ \Carbon\Carbon::parse($updated_at)->toFormattedDateString() }}
                        <br>
                        {{ \Carbon\Carbon::parse($updated_at)->format('h:i A') }}

                        @else  @endif</td>
                        @else
                    <td>@if(isset($admin_remarks)){{$admin_remarks}}@else  @endif</td>
                        @endif
                </tbody>
            </table>
        </div>
    </center>
</div>

@endsection

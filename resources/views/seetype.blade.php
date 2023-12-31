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
                    <th>Your Remarks</th>
                    <th>{{$call_about}}</th>
                    <th>remarks by</th>
                </thead>
                <tbody>
                    @php 
                        if($call_about == 'Accounts'){
                            $ac = App\Models\accounts_call::find($id);
                            $ac_emp = App\Models\usertab::find($ac->accounts_emp);
                            if($ac_emp){
                                $name = $ac_emp->firstname." ".$ac_emp->lastname;
                                $remarks = $ac->accounts_remarks;
                                $admin_remarks = $ac->admin_remarks;
                            }
                        }else{
                            $ac = App\Models\complaint_call::find($id);
                            $ac_emp = App\Models\usertab::find($ac->complaint_emp);
                            if($ac_emp){
                                $name = $ac_emp->firstname." ".$ac_emp->lastname;
                                $remarks = $ac->complaint_remarks;
                                $admin_remarks = $ac->admin_remarks;
                            }
                        }
                    @endphp
                    <td>@if(isset($admin_remarks)){{$admin_remarks}}@else  @endif</td>
                    <td>@if(isset($remarks)){{$remarks}}@else @endif</td>
                    <td>@if(isset($name)){{$name}}@else  @endif</td>
                </tbody>
            </table>
        </div>
    </center>
</div>

@endsection

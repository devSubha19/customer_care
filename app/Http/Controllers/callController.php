<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\accounts_call;
use App\Models\complaint_call;
use App\Models\others_call;
use App\Models\general_query;

class callController extends Controller
{

    public function addcall(Request $request)
    {
        return view('addcall');
    }

    public function savecall(Request $request)
    {


        $sendtype = $request->sendtype;
        $conv_about = $request->convabout;
        $name = $request->name;
        $call_num = $request->callnum;
        $regnum = $request->regnum;
        $ac_issue = $request->acissue;
        $ac_remarks = $request->acremarks;
        $comp_issue = $request->compissue;
        $comp_remarks = $request->compremarks;
        $genq_remarks = $request->genqremarks;
        $others_remarks = $request->othersremarks;

        if ($sendtype === 'accounts') {
            $ac_call = new accounts_call;
            $ac_call->employee = 1;
            $ac_call->customer_name = $name;
            $ac_call->calling_number = $call_num;
            $ac_call->reg_num = $regnum;
            $ac_call->issue = $ac_issue;
            $ac_call->remarks = $ac_remarks;
            $ac_call->save();
        } else if ($sendtype === 'complain') {
            $cm_call = new complaint_call;
            $cm_call->employee = 1;
            $cm_call->customer_name = $name;
            $cm_call->calling_number = $call_num;
            $cm_call->reg_num = $regnum;
            $cm_call->issue = $comp_issue;
            $cm_call->remarks = $comp_remarks;
            $cm_call->save();
        } else if ($sendtype === 'genq') {
            $genq = new general_query;
            $genq->employee = 1;
            $genq->customer_name = $name;
            $genq->calling_number = $call_num;
            $genq->reg_num = $regnum;
            $genq->remarks = $genq_remarks;
            $genq->save();
        } else {
            $others = new others_call;
            $others->employee = 1;
            $others->customer_name = $name;
            $others->calling_number = $call_num;
            $others->reg_num = $regnum;
            $others->remarks = $others_remarks;
            $others->save();
        }
        return redirect('addcall')->with('success', 'call saved');
    }

    public function calllist(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');


        $result = DB::table('accounts_call')
            ->select(DB::raw("'Accounts' as call_about"), 'customer_name', 'calling_number', 'reg_num', 'issue', 'remarks', 'created_at', 'admin_remarks', 'status', 'id')
            ->union(
                DB::table('complaint_call')
                    ->select(DB::raw("'Complaints' as call_about"), 'customer_name', 'calling_number', 'reg_num', 'issue', 'remarks', 'created_at', 'admin_remarks', 'status', 'id')
            )
            ->union(
                DB::table('general_query')
                    ->select(DB::raw("'General Query' as call_about"), 'customer_name', 'calling_number', 'reg_num', DB::raw("'' as issue"), 'remarks', 'created_at', 'admin_remarks', 'status', 'id')
            )
            ->union(
                DB::table('others_call')
                    ->select(DB::raw("'Others' as call_about"), 'customer_name', 'calling_number', 'reg_num', DB::raw("'' as issue"), 'remarks', 'created_at', 'admin_remarks', 'status', 'id')
            )->get();


        if ($fromDate && $toDate) {
            $result = $result->where('created_at', '>=', $fromDate)
                ->where('created_at', '<=', $toDate);
        } elseif ($fromDate) {
            $result = $result->where('created_at', '>=', $fromDate);
        } elseif ($toDate) {
            $result = $result->where('created_at', '<=', $toDate);
        }

        return view('calllist', ['result' => $result, 'fromDate' => $fromDate, 'toDate' => $toDate]);
    }

    public function show_rem_emp(Request $request)
    {
        $id = $request->id;
        $call_about = $request->call_about;

        $ac_admin_rem = $ac_remarks = $cmp_admin_rem = $cmp_remarks = $gqry_admin_rem = $others_admin_rem = '';

        if ($call_about == 'Accounts') {
            $ac = accounts_call::find($id);
            if ($ac) {
                $ac_admin_rem = $ac->admin_remarks;
                $ac_remarks = $ac->accounts_remarks;
            }
        } else if ($call_about == 'Complaints') {
            $cmp = complaint_call::find($id);
            if ($cmp) {
                $cmp_admin_rem = $cmp->admin_remarks;
                $cmp_remarks = $cmp->accounts_remarks;
            }
        } else if ($call_about == 'General Query') {
            $gqry = general_query::find($id);
            if ($gqry) {
                $gqry_admin_rem = $gqry->admin_remarks;
            }
        } else {
            $others = general_query::find($id);
            if ($others) {
                $others_admin_rem = $others->admin_remarks;
            }
        }
        
        return view('show_rem_emp', compact('id', 'call_about', 'ac_admin_rem', 'ac_remarks', 'cmp_admin_rem', 'cmp_remarks', 'gqry_admin_rem', 'others_admin_rem'));
    }        
}
    
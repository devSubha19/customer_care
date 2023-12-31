<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\accounts_call;
use App\Models\complaint_call;
use App\Models\general_query;
use App\Models\others_call;
use Illuminate\Support\Facades\DB;
use PDF;

class reportController extends Controller
{
        public function downloadrepo(Request $request){
        $result = DB::table('accounts_call')
        ->select(DB::raw("'Accounts' as call_about"), 'customer_name', 'calling_number', 'reg_num', 'issue', 'remarks', 'created_at', 'admin_remarks', 'status', 'id', 'employee')
        ->union(
            DB::table('complaint_call')
                ->select(DB::raw("'Complaints' as call_about"), 'customer_name', 'calling_number', 'reg_num', 'issue', 'remarks', 'created_at', 'admin_remarks', 'status', 'id', 'employee')
        )
        ->union(
            DB::table('general_query')
                ->select(DB::raw("'General Query' as call_about"), 'customer_name', 'calling_number', 'reg_num', DB::raw("'' as issue"), 'remarks', 'created_at', 'admin_remarks', 'status', 'id', 'employee')
        )
        ->union(
            DB::table('others_call')
                ->select(DB::raw("'Others' as call_about"), 'customer_name', 'calling_number', 'reg_num', DB::raw("'' as issue"), 'remarks', 'created_at', 'admin_remarks', 'status', 'id', 'employee')
        )->get();

        return view('downloadrepo', compact('result'));
    }

    public function changeaction(Request $request){
        $id = $request->id;
        $call_about = $request->call_about;

        if ($call_about == 'Accounts') {
            $ac = accounts_call::find($id);
            $remarks = $ac->remarks;
            $status = $ac->status;
        } else if ($call_about == 'Complaints') {
            $ac = complaint_call::find($id);
            $remarks = $ac->remarks;
            $status = $ac->status;
        } else if ($call_about == 'General Query') {
            $ac = general_query::find($id);
            $remarks = $ac->remarks;
            $status = $ac->status;
        } else {
            $ac = others_call::find($id);
            $remarks = $ac->remarks;
            $status = $ac->status;
        }
        return view('changeaction', compact('id', 'call_about','remarks','status'));
    }
    
    public function savechangeaction(Request $request){
        $id = $request->id;
        $call_about = $request->call_about;
        $remarks = $request->remarks;
        $status = $request->status; 
 
        if ($call_about == 'Accounts') {
            $ac = accounts_call::find($id);
            $ac->admin_remarks = $remarks;
            if($status){

                $ac->status = $status;
            }
        } else if ($call_about == 'Complaints') {
            $ac = complaint_call::find($id);
            $ac->admin_remarks = $remarks;
            if($status){

                $ac->status = $status;
            }
        } else if ($call_about == 'General Query') {
            $ac = general_query::find($id);
            $ac->admin_remarks = $remarks;
            if($status){

                $ac->status = $status;
            }
        } else {
            $ac = others_call::find($id);
            $ac->admin_remarks = $remarks;
            if($status){

                $ac->status = $status;
            }
        }
        $ac->update();
        return redirect()->back()->with('success', 'action updated');
    }

    public function seetype(Request $request){
        $call_about = $request->call_about;
        $id = $request->id; 
        return view('seetype', compact('call_about','id'));
    }

 
    public function downloadPDF()
    {
        $pdf = PDF::loadView('login');
    
        return $pdf->download('download_report.pdf');
    }
    
    public function accounts_open(Request $request){
        $var = accounts_call::where('status', 'open')->get();
        return view('accounts_open', compact('var'));
    }
    public function accounts_ongoing(Request $request){
        $var = accounts_call::where('status', 'ongoing')->get();
        return view('accounts_ongoing', compact('var'));
    }
    public function accounts_close(Request $request){
        $var = accounts_call::where('status', 'close')->get();
        return view('accounts_close', compact('var'));
    }
    
    public function complaints_open(Request $request){
        $var = complaint_call::where('status', 'open')->get();
        return view('complaints_open', compact('var'));
    }
    public function complaints_ongoing(Request $request){
        $var = complaint_call::where('status', 'ongoing')->get();
        return view('complaints_ongoing', compact('var'));
    }
    public function complaints_close(Request $request){
        $var = complaint_call::where('status', 'close')->get();
        return view('complaints_close', compact('var'));
    }
    public function general_query_repo(Request $request){
        $var = general_query::all();
        return view('general_query_repo', compact('var'));
    }
    public function others_repo(Request $request){
        $var = others_call::all();
        return view('others_repo', compact('var'));
    }

        public function open_complaint(Request $request){
        $var = complaint_call::where('status', 'open')->get();
        return view('Open_complaint', compact('var'));
    }
    public function ongoing_complaint(Request $request){
        $var = complaint_call::where('status', 'ongoing')->get();
        return view('Ongoing_complaint', compact('var'));
    }
    public function close_complaint(Request $request){
        $var = complaint_call::where('status', 'close')->get();
        return view('Close_complaint', compact('var'));
    }
        public function open_account(Request $request){
        $var = complaint_call::where('status', 'open')->get();
        return view('Open_account', compact('var'));
    }
    public function ongoing_account(Request $request){
        $var = complaint_call::where('status', 'ongoing')->get();
        return view('Ongoing_account', compact('var'));
    }
    public function close_account(Request $request){
        $var = complaint_call::where('status', 'close')->get();
        return view('Close_account', compact('var'));
    }


}

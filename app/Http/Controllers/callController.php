<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class callController extends Controller
{

    public function addcall(Request $request){
        return view('addcall');
}

    public function savecall(Request $request){
        dd($request->all());
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
         
        if($sendtype ===  'accounts'){
                
         }else if($sendtype === 'complain'){

         }else if($sendtype === 'genq'){

         }else{

         }
    }
}

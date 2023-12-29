<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertab;

class UserController extends Controller
{
    public function user(Request $request){
        $users = usertab::all();
        return view('viewuser', compact('users'));
    }
    public function adduser(Request $request){
        return view('adduser');
    }

    public function saveuser(Request $request){
         
        $user  = new usertab;
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phno;
        $user->gender = $request->gender;
        $user->utype = $request->type;
        $user->dob = $request->dob;
         $user->password = $request->password;
        $user->save();

        return redirect('viewuser');
    }

    public function banuser(Request $request){
        $sup = usertab::find($request->id);
        $sup->status = ($request->status == 0) ? 1 : 0;
        $sup->save();
        $status  = ($sup->status == 0 ) ?  "banned" : "unbanned"; 
        return redirect('viewuser')->with("success","$sup->name $status");
    }

    public function addcall(Request $request){
            return view('addcall');
    }
}

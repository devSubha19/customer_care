<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertab;
use App\Models\admin;

class UserController extends Controller
{

    public function admin(Request $request){
        $admin = admin::all();
        return view('admin', compact('admin'));
    }
    public function editadmin(Request $request){
        $admin = admin::find($request->id);
        return view('editadmin', compact('admin'));
    }
    public function saveeditadmin(Request $request){
        $admin = admin::find($request->id);
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->password = $request->password;  
        $admin->save();
        return view('admin');
    }
    public function user(Request $request){
        $users = usertab::all();
        return view('viewuser', compact('users'));
    }
    public function adduser(Request $request){
        return view('adduser');
    }

    public function edituser(Request $request){
        $user = usertab::find($request->id);
        return view('edituser', compact('user'));
    }

    public function saveedituser(Request $request){
         $user = usertab::find($request->id);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phno;
        $user->gender = $request->gender;
        $user->utype = $request->type;
        $user->dob = $request->dob;
        $user->password = $request->password;
        $user->update();
        return redirect('viewuser');
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

    
}

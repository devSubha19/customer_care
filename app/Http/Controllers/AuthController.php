<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\usertab;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }
    public function auth(Request $request)
    {
        $userId = $request->userId;
        $received_password = $request->password;

        $admin = admin::where('username', $userId)->first();
        $user = usertab::where('username', $userId)->first();


        if ($admin) {
            $stored_password = $admin->password;
            $decrypted_password = $stored_password;
            if ($decrypted_password == $received_password) {
                session(['user_type' => 'admin', 'user_id' => $admin->id]);
                return redirect('admin')->with('success', 'logged In Successfully');
            } else {
                return redirect()->back()->with('error', 'Username Or Password Invalid');
            }
        } else if ($user) {
            $user_status = $user->status;
            $user_type = $user->utype;
            $stored_password = $user->password;
            $decrypted_password = $stored_password;
            if ($decrypted_password == $received_password) {
                if ($user_status == 0) {
                    return redirect()->back()->with('error', 'You are blocked');
                } else {
                    if ($user_type == 'complain') {
                        session(['user_type' => $user_type, 'user_id' => $user->id]);
                        return redirect('complain-clist')->with('success', 'logged In Successfully');
                    } elseif ($user_type == 'account') {
                        session(['user_type' => $user_type, 'user_id' => $user->id]);
                        return redirect('account-clist')->with('success', 'logged In Successfully');
                    } else {
                        session(['user_type' => $user_type, 'user_id' => $user->id]);
                        return redirect('addcall')->with('success', 'logged in successfully');
                    }

                }
            } else {
                return redirect()->back()->with('error', 'Username Or Password Invalid');
            }

        } else {
            return redirect()->back()->with('error', 'Username Or Password Invalid');
        }

    }

    public function UserLogOut(Request $request)
    {
        session()->flush();
        return redirect('/')->with('success', 'log out Successfully');
    }
}

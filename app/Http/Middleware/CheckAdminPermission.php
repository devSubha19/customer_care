<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if(session('user_id') != null){
            
        $userType = session('user_type');

        $allowedUserType = 'admin';
        if($userType != $allowedUserType){
            return response()->view('layouts.dist.forbidden', [],403);
        }

        return $next($request);
    }else{
        return redirect('logout');
    }
    
}

}

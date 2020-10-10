<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;


class cekRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // cek user jika ada role admin
        if(Auth::user() && Auth::user()->role == "1"){
            return $next($request);
            // return redirect('/admin');
        }
        // $user = \App\User::where('email', $request->email)->first();
        // if ($user->role == '1') {
        //     return redirect('admin');
        // } 
        // elseif ($user->status == 'mahasiswa') {
        //     return redirect('mahasiswa/dashboard');
        // }
        // return $next($request);
        return redirect('/login');
    }
}

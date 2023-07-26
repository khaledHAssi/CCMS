<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->type == 'student') {return redirect()->route('site.index');}
        return $next($request);
        // switch (Auth::user()->type) {
        //     case 'super-admin':
        //         return redirect()->route('admin.index');
        //         break;
        //     case 'companyManager':
        //         return redirect()->route('user_dash.cmindex');
        //         break;
        //     case 'companySupervisor':
        //         return redirect()->route('user_dash.supervisor.index');
        //         break;
        //     case 'doctor':
        //         return redirect()->route('user_dash.doctor.dash.index');
        //         break;
        //     default:
        //         return redirect()->route('site.index');
        // }
        // ----------------------------------------------------------------
        // if(Auth::user()->type =='student'){ return redirect('/');}
        // ----------------------------------------------------------------
        // if(Auth::user()->type =='student') return redirect('/not-allowed');
    }
}

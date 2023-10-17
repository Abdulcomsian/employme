<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class EmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::check() && !auth()->user()->email_verified_at) {
            $request->session()->put(['email_verification' => 'yes']);
            if (auth()->user()->hasRole('candidate') && $request->route()->getName() !== 'getCandidateDashboard' && $request->route()->getName() !== 'authLogout' && $request->route()->getName() !== 'verification.send' && $request->route()->getName() !== 'verification.verify') {
                return redirect()->route('getCandidateDashboard');
            }elseif(auth()->user()->hasRole('employer') && ($request->route()->getName() !== 'getEmployerDashboard' && $request->route()->getName() !== 'authLogout' && $request->route()->getName() !== 'verification.verify')) {
                return redirect()->route('getEmployerDashboard');
            }
        } 
        else 
        {
            $request->session()->forget('email_verification');
        }
    
        return $next($request);
    }
    
}

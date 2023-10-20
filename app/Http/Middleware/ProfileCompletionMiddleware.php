<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileCompletionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (\Auth::check() && auth()->user()->hasRole('employer')) {
            if(employeeProfilePercentage() < 90)
            {
                $request->session()->put(['profile_completion' => 'yes']);
            if ($request->route()->getName() !== 'getEmployerProfile' && $request->route()->getName() !== 'authLogout' && $request->route()->getName() !== 'verification.send' && $request->route()->getName() !== 'verification.verify') 
            {
                return redirect()->route('getEmployerProfile');
            }

            }else{
                $request->session()->forget('profile_completion');
            }
        }elseif(\Auth::check() && auth()->user()->hasRole('candidate')) {
            if(candidateProfilePercentage() < 90)
            {
                $request->session()->put(['profile_completion' => 'yes']);
            if ($request->route()->getName() !== 'getCandidateProfile' && $request->route()->getName() !== 'authLogout' && $request->route()->getName() !== 'verification.send' && $request->route()->getName() !== 'verification.verify') 
            {
                return redirect()->route('getCandidateProfile');
            }

            }else{
                $request->session()->forget('profile_completion');
            }
        }


        return $next($request);
    }
}

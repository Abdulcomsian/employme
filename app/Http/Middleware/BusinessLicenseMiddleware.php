<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\EmployerBusinessLicense;
class BusinessLicenseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::check() && auth()->user()->hasRole('employer')) {
           $employerLicenseDetails =  EmployerBusinessLicense::where('employer_id',\Auth::id())->first();
           if(isset($employerLicenseDetails) && $employerLicenseDetails->approval_status ==0)
           {
                $request->session()->put(['license_approval' => 'yes']);
                if ($request->route()->getName() !== 'getEmployerProfile' && $request->route()->getName() !== 'authLogout' && $request->route()->getName() !== 'verification.send' && $request->route()->getName() !== 'verification.verify') 
                {
                    return redirect()->route('getEmployerProfile');
                }
           }else
           {
            $request->session()->forget('license_approval');
           }
          
           
        }
        return $next($request);
    }
}

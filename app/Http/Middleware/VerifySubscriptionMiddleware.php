<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\{EmployerBusinessLicense};
use Carbon\carbon;
class VerifySubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employerLicenseDetails =  EmployerBusinessLicense::where('employer_id',\Auth::id())->first();
                
        if($employerLicenseDetails && $employerLicenseDetails->approval_status == 1 && (!auth()->user()->lastApprovedSubscription || Carbon::now()->gt(Carbon::parse(auth()->user()->lastApprovedSubscription->ends_at))))
        {
            return redirect()->route('getEmployerSubscriptionPlan');    
        }
        
        return $next($request);
    }
}

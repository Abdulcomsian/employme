<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\{EmployerBusinessLicense};

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
        if($employerLicenseDetails && $employerLicenseDetails->approval_status == 1 && (!auth()->user()->lastSubscription || !is_null(auth()->user()->lastSubscription->ends_at)))
        {
            return redirect()->route('getEmployerSubscriptionPlan');    
        }
        return $next($request);
    }
}

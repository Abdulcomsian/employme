<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->expectsJson())
        {
            return null;
        }
        else{
            toastr()->warning('You are not logged In, Please Login');
            return  route('signup');
        }
    }
}

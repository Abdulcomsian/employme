<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\{EmployerDetails, EmployerBusinessLicense};
use Illuminate\Support\Facades\Auth;
class BusinessLicenseRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $employerDetails = EmployerBusinessLicense::where('employer_id',Auth::id())->first();
        if(isset($employerDetails))
        {
            if($value == '' || $value == 'undefined')
            {
                if( $employerDetails->license_file == '')
                {
                    $fail('You haven\'t upload your Business License, kindly Upload Your Business License Certificate');
                }
            }
        }
        
      
    }
}

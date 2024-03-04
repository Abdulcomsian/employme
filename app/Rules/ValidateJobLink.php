<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\{EmployerJob, JobInterview};
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
class ValidateJobLink implements ValidationRule
{
   
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
     protected $candidateId;
     public function __construct($candidateId)
     {
        $this->candidateId = $candidateId;
     }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $urlParts = explode('/', $value);
        $jobId = end($urlParts);
       
        $employerJob = EmployerJob::where('id', $jobId)
            ->where('posted_by', auth()->id());

        $interviewRequestExists = JobInterview::where(['employer_job_id'=>$jobId,'requested_from'=>auth()->id(),'requested_to'=>$this->candidateId]);
        

       if(!$employerJob->exists())
       {
            $fail("The Job doesn't exist on the Provided Url");
       }
       if($interviewRequestExists->exists())
       {
            $fail("Already Requested");
       }
    }
}

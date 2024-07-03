<?php 

namespace App\Http;

class AppConst{

    //reference table business license , column approval_status
    public const LICENSE_PENDING = 0;
    public const LICENSE_APPROVED = 1;
    public const LICENSE_REJECTED = 3;

    //reference table candidate document column status
    public const DEGREE = 1;
    public const POLICE_CERTIFICATE = 2;
    public const PASSPORT = 6;
    public const DEGREE_APOSTILED = 3;
    public const POLICE_APOSTILLED = 4;
    public const SAQA_LETTER = 5;

    //reference table user column is_eligible
    public const ELIGIBILITY_PENDING = 2;
    public const ELIGIBILITY_REJECTED = 0;
    public const ELIGIBILITY_APPROVED = 1;

    //reference table employer_jobs column job_status
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    //reference table job_interview column status
    public const INTERVIEW_SCHEDULED = 1;
    public const INTERVIEW_REJECTED = 2;
    public const INTERVIEW_CONDUCTED = 3;


}
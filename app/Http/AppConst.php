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
}
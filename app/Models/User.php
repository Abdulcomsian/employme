<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword ;
use Laravel\Cashier\Billable;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;


class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::addGlobalScope('user_detail' , function (Builder $builder) {
            $builder->with('lastSubscription' , 'intro');
        });
    }

    public function candidatePersonalDetails()
    {
        return $this->hasOne(CandidatePersonalDetails::class,'user_id');
    }
    public function candidateEducation()
    {
        return $this->hasOne(CandidateEducation::class,'user_id');
    }
    public function candidatePreferences()
    {
        return $this->hasOne(CandidatePreferences::class,'user_id');
    }
    public function employerSubscription()
    {
        return $this->hasMany(Subscription::class,'user_id');
    }
    public function employerDetails()
    {
        return $this->hasOne(EmployerDetails::class,'user_id');
    }
    public function candidateEducationalDetails()
    {
        return $this->hasMany(CandidateEducationalDetail::class,'user_id');
    }
    public function candidateHighestQualification()
    {
        return $this->hasOne(CandidateEducationalDetail::class,'user_id');
    }

    public function jobsApplied()
    {
        return $this->belongsToMany(EmployerJob::class, 'job_applications','candidate_id','employer_job_id')->withPivot('cover_letter','created_at');
    }
    public function savedJobs()
    {
        return $this->belongsToMany(EmployerJob::class, 'saved_jobs','user_id','employer_job_id')->with('employerDetails','jobCategory');
    }
    public function savedCandidates()
    {
        return $this->belongsToMany(User::class, 'saved_candidates','user_id','candidate_id')->with('candidatePersonalDetails','candidateEducation','candidatePreferences');;
    } 
    public function totalApplicants($job_id)
    {
       return \DB::table('job_applications')->where('employer_job_id',$job_id)->count();
    }
    public function documents()
    {
        return $this->hasMany(CandidateDocument::class , 'user_id' , 'id');
    }
    public function license()
    {
        return $this->hasOne(EmployerBusinessLicense::class , 'employer_id' , 'id');
    }
    public function lastSubscription()
    {
        return $this->hasOne(Subscription::class , 'user_id' , 'id')->orderBy('id' , 'desc');
    }
    public function intro()
    {
        return $this->hasOne(IntroductionVideo::class , 'employer_id' , 'id');
    }

    
}

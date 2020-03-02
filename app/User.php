<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $guarded = [];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function performance()
    {
        return $this->hasMany(Performance::class);
    }
    
    public function supportStaffAppraisal()
    { 
        return $this->hasMany(SupportStaffAppraisal::class);
    }

    public function headOfDepartmentPerformances()
    {
        return $this->hasMany(Performance::class, 'head_of_department_id', 'id');
    }

    public function headOfDepartmentProfiles()
    {
        return $this->hasMany(Profile::class, 'head_of_department_id', 'id');
    }

    public function employeeNameTrainees()
    {
        return $this->hasMany(Trainee::class, 'employee_name_id', 'id');

    }

    public function employeeNameTraineesReport()
    {
        return $this->hasMany(Trainee::class, 'user_id', 'id');

    }

    public function employeeNameRewards()
    {
        return $this->hasMany(Reward::class, 'employee_name_id', 'id');
    }

    public function headOfDepartmentSupportStaffAppraisals()
    {
        return $this->hasMany(SupportStaffAppraisal::class, 'head_of_department_id', 'id');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    { 
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function isHR()
    {
        return $this->roles->contains(4);
    }

    public function isHOD()
    {
        return $this->roles->contains(3);
    }

    public function isHOD2()
    {
        return $this->roles->contains(6);
    }
}

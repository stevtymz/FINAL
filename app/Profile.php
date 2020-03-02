<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\Multitenantable;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class Profile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Multitenantable, HasEncryptedAttributes;

    public $table = 'profiles';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
    protected $casts = ['date_of_birth'];

    protected $guarded = [];
    
    /**
     * The attributes that should be encrypted on save.
     *
     * @var array
     */
    protected $encrypted = [
        'first_name','last_name','date_of_birth'
    ];

    public function profilePerformances()
    {
        return $this->hasMany(Performance::class, 'profile_id', 'id');
    }

    public function profileSupportStaffAppraisals()
    {
        return $this->hasMany(SupportStaffAppraisal::class, 'profile_id', 'id');
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function salary_scale()
    {
        return $this->belongsTo(Salary::class, 'salary_scale_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function head_of_department()
    {
        return $this->belongsTo(Department::class, 'head_of_department_id');
    }
}

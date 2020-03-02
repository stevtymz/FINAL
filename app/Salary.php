<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;

    public $table = 'salaries';

    protected $dates = [
        'year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'year',
        'ammount',
        'job_title',
        'created_at',
        'updated_at',
        'deleted_at',
        'salary_scale',
    ];

    

    public function salaryScaleProfiles()
    {
        return $this->hasMany(Profile::class, 'salary_scale_id', 'id');
    }

    public function getYearAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setYearAttribute($value)
    {
        $this->attributes['year'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

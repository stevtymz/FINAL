<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use Illuminate\Support\Facades\Notification;

class Performance extends Model
{
    use SoftDeletes,Multitenantable;
 
    public $table = 'performances';

    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    const EMP_RATING_SELECT = [
        '1' => '1 Poor',
        '2' => '2 Fair',
        '3' => '3 Good',
        '4' => '4 Very good',
        '5' => '5 Excellent',
    ];

    const HOD_RATING_SELECT = [
        '1' => '1 Poor',
        '2' => '2 Fair',
        '3' => '3 Good',
        '4' => '4 Very good',
        '5' => '5 Excellent',
    ];

    const QUALIFICATION_RATING_SELECT = [
        '10' => 'Masters Degree',
        '15' => 'PhD',
        '5' => 'Other qualifications',

    ];

    const PUBLICATION1_RATING_SELECT = [
        '3' => '1 publication',
        '6' => '2 publications',
        '9' => '3 publications',
        '12' => '4 publications',
        '15' => '5 publications',
        '0' =>'None',
    ];

    const PUBLICATION2_RATING_SELECT = [
        '5' => 'Published book',
        '3' => 'Book Chapter',
        '0' =>'None',
        
    ];

    const EXPERIENCE_RATING_SELECT = [
        '1.5' => '1 Year',
        '3' => '2 Years',
        '4.5' => '3 Years',
        '6' => '4 Years',
        '7.5' => '5 Years',
        '9' => '6 Years',
        '10.5' => '7 Years',
        '12' => '8 Years',
        '13.5' => '9 Years',
        '15' => '10 Years',
    ];

    const GRANTS_RATING_SELECT = [
        '8' => 'More than Shs.1bn',
        '5' => 'Shs.100m - Shs.1bn',
        '3' => 'Less than Shs.100m',
        '0' =>'None',
    ];

    const SUPERVISION_RATING_SELECT = [
        '5' => 'PhD',
        '3' => 'Masters',
        '1' => 'Postgraduate Diploma',
        '0' =>'None',
    ];

    const OTHER_RATING_SELECT = [
        '2' => 'Presenting a paper at a conference/Seminar',
        '1' => 'Organizer/Convener of a conference/Seminar',
        '0' =>'None',
    ];

    const SERVICE_RATING_SELECT = [
        '3' => 'Dean/Director',
        '1' => 'Head of Department',
        '1' => 'Membership on Committees',
        '0' =>'None',
    ];

    protected $guarded = [];
    
    public static function boot()
    {
        parent::boot();

        Performance::observe(new \App\Observers\PerformanceActionObserver);

    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function head_of_department()
    {
        return $this->belongsTo(User::class, 'head_of_department_id');
    }

}

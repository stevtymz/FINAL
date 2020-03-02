<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use Illuminate\Support\Facades\Notification;

class SupportStaffAppraisal extends Model
{
    use SoftDeletes,Multitenantable;

    public $table = 'support_staff_appraisals';

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

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        SupportStaffAppraisal::observe(new \App\Observers\SupportStaffAppraisalActionObserver);

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

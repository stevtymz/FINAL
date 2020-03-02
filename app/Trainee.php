<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TrainingMultitenatable;
class Trainee extends Model
{
    use SoftDeletes,TrainingMultitenatable;

    public $table = 'trainees';

    protected $dates = [
        'time_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'venue',
        'time_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'programme_name',
        'employee_name_id',
    ];

    public function employee_name()
    {
        return $this->belongsTo(User::class, 'employee_name_id');
    }

    public function getTimeDateAttribute($value) 
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimeDateAttribute($value)
    {
        $this->attributes['time_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

class TimeWorkType extends Model
{
    use SoftDeletes, Multitenantable;

    public $table = 'time_work_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    public function workTypeTimeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'work_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

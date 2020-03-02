<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

class TimeProject extends Model
{
    use SoftDeletes, Multitenantable;

    public $table = 'time_projects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    public function projectTimeEntries()
    {
        return $this->hasMany(TimeEntry::class, 'project_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

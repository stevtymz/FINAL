<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentUser extends Model
{
    protected $table = 'department_user';

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

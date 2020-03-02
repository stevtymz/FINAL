<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = 'departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function departmentsUsers()
    {
        return $this->belongsToMany(User::class);
    }

}
 
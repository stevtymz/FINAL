<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RewardsMultitenatable;
class Reward extends Model
{
    use SoftDeletes,RewardsMultitenatable;

    public $table = 'rewards';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    public function employee_name()
    {
        return $this->belongsTo(User::class, 'employee_name_id');
    }
}

<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
trait RewardsMultitenatable{
    public static function bootRewardsMultitenatable(){
        
            $isHR = auth()->user()->roles->contains(4);
            if (!$isHR) {
                static::addGlobalScope('reward_access',function(Builder $builder){
                    if(auth()->check())
                    {
                        
                        return $builder->where('employee_name_id', auth()->id());
                        
                    }         
                         
                });
            } 
    }
}
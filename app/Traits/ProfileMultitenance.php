<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
trait ProfileMultitenance{
    public static function bootProfileMultitenance(){
      
            $isHR = auth()->user()->roles->contains(4);
            if (!$isHR) {
                static::addGlobalScope('profile_access',function(Builder $builder){
                    if(auth()->check())
                    {
                        
                        return $builder->where('head_of_department_id', auth()->id())->orWhere('user_id', auth()->id());
                        
                    } 
                            
                        
                });
            } 
        
    }
}
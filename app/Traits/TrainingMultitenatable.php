<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
trait TrainingMultitenatable{
    public static function bootTrainingMultitenatable(){
       
            $isHR = auth()->user()->roles->contains(4);
            if (!$isHR) {
                static::addGlobalScope('trainee_access',function(Builder $builder){
                    if(auth()->check())
                    {
                        
                        return $builder->where('employee_name_id', auth()->id());
                        
                    }         
                        
                });
            } 
    }
}
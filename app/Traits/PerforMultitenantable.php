<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
trait PerforMultitenantable{
    public static function bootMultitenantable(){
        if (auth()->check()){
            static::creating(function($model){
                $model->user_id = auth()->id();
                $model->head_of_department_id = auth()->profile->head_of_department_id;
            }); 
            $isHR = auth()->user()->roles->contains(4);
            if (!$isHR) {
                static::addGlobalScope('appraisal_access',function(Builder $builder){
                    if(auth()->check())
                    {
                        
                        return $builder->where('head_of_department_id', auth()->id())->orWhere('user_id', auth()->id());
                        
                    } 
                        
                        
                        
                });
            } 
        }
    }
}
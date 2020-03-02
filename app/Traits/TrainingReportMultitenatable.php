<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
trait TrainingReportMultitenatable{
    public static function bootTrainingReportMultitenatable(){
       
        if (auth()->check()){
            static::creating(function($model){
                $model->user_id = auth()->id();
            });
            $isHR = auth()->user()->roles->contains(4);
            if (!$isHR) {
                static::addGlobalScope('report_access',function(Builder $builder){
                    if(auth()->check())
                    {
                        
                        return $builder->where('user_id', auth()->id());
                        
                    } 
                             
                });
            } 
        }
    }
}
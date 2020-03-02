<?php

namespace App\Observers;

use App\Performance;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AssignedPerformanceNotification;

class PerformanceActionObserver
{
    /**
     * Handle the performance "created" event.
     *
     * @param  \App\Performance  $performance
     * @return void
     */
    public function created(Performance $model)
    {
        $data  = ['action' => 'New Appraisal has been created!', 'model_name' => 'Performance', 'performance' => $model];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'HOD', 'head_of_department_id');
        })->get();
        Notification::send($users, new AssignedPerformanceNotification($data));
    }

    /**
     * Handle the performance "updated" event.
     *
     * @param  \App\Performance  $performance
     * @return void
     */
    public function updated(Performance $performance)
    {
        //
    }

    /**
     * Handle the performance "deleted" event.
     *
     * @param  \App\Performance  $performance
     * @return void
     */
    public function deleted(Performance $performance)
    {
        //
    }

    /**
     * Handle the performance "restored" event.
     *
     * @param  \App\Performance  $performance
     * @return void
     */
    public function restored(Performance $performance)
    {
        //
    }

    /**
     * Handle the performance "force deleted" event.
     *
     * @param  \App\Performance  $performance
     * @return void
     */
    public function forceDeleted(Performance $performance)
    {
        //
    }
}

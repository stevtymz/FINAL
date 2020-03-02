<?php

namespace App\Observers;

use App\SupportStaffAppraisal;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AssignedSupportstaffNotification;

class SupportStaffAppraisalActionObserver
{
    /**
     * Handle the support staff appraisal "created" event.
     *
     * @param  \App\SupportStaffAppraisal  $supportStaffAppraisal
     * @return void
     */
    public function created(SupportStaffAppraisal $model)
    {
        $data  = ['action' => 'New Appraisal has been created!', 'model_name' => 'SupportStaffAppraisal', 'supportStaffAppraisal' => $model];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'HOD2', 'head_of_department_id');
        })->get();
        Notification::send($users, new AssignedSupportstaffNotification($data));
    }

    /**
     * Handle the support staff appraisal "updated" event.
     *
     * @param  \App\SupportStaffAppraisal  $supportStaffAppraisal
     * @return void
     */
    public function updated(SupportStaffAppraisal $supportStaffAppraisal)
    {
        //
    }

    /**
     * Handle the support staff appraisal "deleted" event.
     *
     * @param  \App\SupportStaffAppraisal  $supportStaffAppraisal
     * @return void
     */
    public function deleted(SupportStaffAppraisal $supportStaffAppraisal)
    {
        //
    }

    /**
     * Handle the support staff appraisal "restored" event.
     *
     * @param  \App\SupportStaffAppraisal  $supportStaffAppraisal
     * @return void
     */
    public function restored(SupportStaffAppraisal $supportStaffAppraisal)
    {
        //
    }

    /**
     * Handle the support staff appraisal "force deleted" event.
     *
     * @param  \App\SupportStaffAppraisal  $supportStaffAppraisal
     * @return void
     */
    public function forceDeleted(SupportStaffAppraisal $supportStaffAppraisal)
    {
        //
    }
}

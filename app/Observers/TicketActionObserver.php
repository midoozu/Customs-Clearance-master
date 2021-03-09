<?php

namespace App\Observers;

use App\Notifications\DataChangeEmailNotification;
use App\Notifications\AssignedTicketNotification;
use App\Notifications\StatusChanged;
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Notification;

class TicketActionObserver
{
    public function created(Ticket $model)
    {
//        $data  = ['action' => 'New Project has been created!', 'model_name' => 'Ticket', 'ticket' => $model];
//        $users = User::whereHas('roles', function ($q) {
//            return $q->where('title', 'Admin');
//        })->get();
//        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Ticket $model)
    {
        if($model->isDirty('assigned_to_user_id'))
        {
            $user = $model->assigned_to_user;
            if($user)
            {
                Notification::send($user, new AssignedTicketNotification($model));
            }
        }
        if($model->isDirty('status_id'))
        {
            if ($model->status_id == 1) {
                $user = $model->assigned_to_user;
            }
            else {
                $user = User::whereHas('roles', function ($q) {
                    return $q->where('title', 'Admin');
                })->get();
            }
            if($user)
            {
                Notification::send($user, new StatusChanged($model));
            }

        }
    }
    public function changed(Ticket $model)
    {
        if($model->isDirty('status_id'))
        {
            if ($model->status_id == 1) {
                $user = $model->assigned_to_user;
            }
            else {
                $user = User::whereHas('roles', function ($q) {
                    return $q->where('title', 'Admin');
                })->get();
            }
            if($user)
            {
                Notification::send($user, new StatusChanged($model));
            }
        }
    }
}

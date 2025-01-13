<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserLog;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        UserLog::create([
            'action' => 'created user: ' . $user->name,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'updated user: ' . $user->name,
        ]);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        UserLog::create([
            'action' => 'deleted user: ' . $user->email,
        ]);
    }
}

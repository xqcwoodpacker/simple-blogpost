<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\UserLog;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'created category:'.$category->name,
        ]);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'deleted category:'.$category->name,
        ]);
    }
}

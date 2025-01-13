<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\UserLog;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'created post: ' . $post->title,
        ]);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'updated post: ' . $post->title,
        ]);
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'deleted post: ' . $post->title,
        ]);
    }
}

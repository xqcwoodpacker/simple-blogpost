<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\UserLog;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'commented on post:'.$comment->post->title,
        ]);
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'updated comment on post:'.$comment->post->title,
        ]);
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        UserLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'deleted comment on post:'.$comment->post->title,
        ]);
    }
}

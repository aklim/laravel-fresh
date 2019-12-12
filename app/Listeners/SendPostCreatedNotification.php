<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\Eloquent\Post;

class SendPostCreatedNotification
{
    /**
     * @param PostCreated $event
     *
     * @return void
     */
    public function handle(PostCreated $event)
    {
        // $event->post;
    }
}

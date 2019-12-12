<?php

namespace App\Listeners;

use App\Events\PostUpdated;
use App\Models\Eloquent\Post;

class SendPostUpdatedNotification
{
    /**
     * @param PostUpdated $event
     *
     * @return void
     */
    public function handle(PostUpdated $event)
    {
        // $event->post;
    }
}

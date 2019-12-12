<?php

namespace App\Listeners;

use App\Events\PostUpdated;
use App\Models\Eloquent\Post;

class SendPostUpdatedNotification
{
    public function via()
    {

    }
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

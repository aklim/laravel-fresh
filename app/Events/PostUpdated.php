<?php

namespace App\Events;

use App\Models\Eloquent\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Raise event about post created.
 * @package App\Events
 *
 * @athor   Andrey Klimenko <andrey.iemail@gmail.com>
 * @version 1.0.0
 */
class PostUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @inheritDoc
     */
    public function broadcastOn()
    {
        return new Channel('posts'); // ['posts'];
    }
}

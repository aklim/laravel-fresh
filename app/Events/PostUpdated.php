<?php

namespace App\Events;

use App\Models\Eloquent\Post;
use Illuminate\Queue\SerializesModels;

/**
 * Raise event about post created.
 * @package App\Events
 *
 * @athor   Andrey Klimenko <andrey.iemail@gmail.com>
 * @version 1.0.0
 */
class PostUpdated
{
    use SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}

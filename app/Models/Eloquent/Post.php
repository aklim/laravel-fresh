<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Class Post
 * @package App\Models\Eloquent
 *
 * @athor   Andrey Klimenko <andrey@cyberwrite.com>
 * @version 1.0.0
 */
class Post extends Model
{
    use Notifiable, SoftDeletes;

    //protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content',
    ];
}

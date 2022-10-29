<?php

namespace App\Models;

use App\Events\ArticleEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $dispatchedEvents = [
        'created' => ArticleEvent::class
    ];
}

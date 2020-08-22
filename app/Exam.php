<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name', 'video', 'video_thumbnail',
    ];

    /**
     * Accessors & Mutators
     */
    public function getVideoAttribute()
    {
        return ('videos/' . $this->attributes['video']);
    }
    public function getVideoThumbnailAttribute()
    {
        return ('videos/' . $this->attributes['video_thumbnail']);
    }

    /**
     * Relations
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

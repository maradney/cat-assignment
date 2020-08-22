<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'answer',
        'answers', // json text
    ];

    /**
     * Accessors & Mutators
     */
    public function getAnswersAttribute()
    {
        return json_decode($this->attributes['answers'], true);
    }
}

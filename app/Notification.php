<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'message',
    ];

    /**
     * Accessors & Mutators
     */
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->toDayDateTimeString();
    }
    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

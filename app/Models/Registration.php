<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'event_id', 'name', 'email', 'gender', 'age', 'cash'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registered extends Model
{
    protected $fillable = ['name', 'cpf', 'email', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timeslot extends Model
{
    protected $guarded = [];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }

    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

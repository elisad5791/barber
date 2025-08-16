<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Master extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    public function timeslots(): HasMany
    {
        return $this->hasMany(Timeslot::class)->with('service')->where('start', '>=', Carbon::now()->startOfWeek());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class);
    }
}

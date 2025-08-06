<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Master extends Model
{
    protected $guarded = [];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}

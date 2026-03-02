<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    protected $guarded = [];

    public function musi(): HasMany
    {
        return $this->hasMany(Misi::class);
    }
}

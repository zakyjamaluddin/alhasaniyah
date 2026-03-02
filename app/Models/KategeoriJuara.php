<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategeoriJuara extends Model
{
    protected $guarded = [];
    public function juaras()
    {
        return $this->hasMany(Juara::class);
    }
}

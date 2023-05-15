<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotVaccine extends Model
{
    use HasFactory;

    public function vaccine()
    {
        return $this->hasMany(Vaccine::class);
    }

    public function spot()
    {
        return $this->hasMany(Spot::class);
    }
}

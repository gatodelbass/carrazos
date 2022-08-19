<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityDepartment extends Model
{
    public function cityMunicipalities()
    {
        return $this->hasMany(CityMunicipality::class);
    }
}

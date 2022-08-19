<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityMunicipality extends Model
{
    public function cityDepartment()
    {
        return $this->belongsTo(CityDepartment::class);
    }
}

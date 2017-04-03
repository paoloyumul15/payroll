<?php

namespace App\Models;

class Holiday extends BaseModel
{
    public function scopeRegular($query)
    {
        return $query->where('type', 'RH');
    }

    public function scopeSpecial($query)
    {
        return $query->where('type', 'SNWH');
    }
}

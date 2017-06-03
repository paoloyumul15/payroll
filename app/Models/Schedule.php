<?php

namespace App\Models;

class Schedule extends BaseModel
{
    protected $fillable = [
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'is_default',
    ];

    protected $casts = [
        'monday' => 'array',
        'tuesday' => 'array',
        'wednesday' => 'array',
        'thursday' => 'array',
        'friday' => 'array',
        'saturday' => 'array',
        'sunday' => 'array',
        'is_default' => true,
    ];
}

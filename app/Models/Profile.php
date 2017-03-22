<?php

namespace App\Models;

class Profile extends BaseModel
{
    protected $fillable = [
        'user_id',
        'age',
        'gender',
        'birth_date',
        'civil_status',
        'place_of_birth',
        'address',
        'telephone_number',
        'mobile_number',
        'date_hired',
        'date_end',
        'sss_number',
        'phil_health_number',
        'pagibig_number',
        'tin_number',
        'account_number',
        'status',
    ];
}

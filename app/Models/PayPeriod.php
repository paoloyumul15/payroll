<?php

namespace App\Models;

use App\Scopes\CompanyScope;

class PayPeriod extends BaseModel
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope);
    }

    protected $dates = [
        'start_date',
        'end_date',
        'pay_out_date',
    ];

    protected $fillable = [
        'company_id',
        'start_date',
        'end_date',
        'pay_out_date',
    ];
}

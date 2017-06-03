<?php

namespace App\Models;

use App\Scopes\CompanyScope;

class Schedule extends BaseModel
{
    protected $fillable = [
        'company_id',
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

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function persist()
    {
        $attributes['company_id'] = companyId();

        /** @var Schedule $schedule */
        $schedule = (new self)->create($attributes);

        return $schedule;
    }
}

<?php

namespace App\Models;

use App\Scopes\CompanyScope;

class Schedule extends BaseModel
{
    protected $fillable = [
        'company_id',
        'monday',
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
        'is_default' => 'boolean',
    ];

    public function setMondayAttribute($value)
    {
        return $this->attributes['monday'] = json_encode($value);
    }

    public function setTuesdayAttribute($value)
    {
        return $this->attributes['tuesday'] = json_encode($value);
    }

    public function setWednesdayAttribute($value)
    {
        return $this->attributes['wednesday'] = json_encode($value);
    }

    public function setThursdayAttribute($value)
    {
        return $this->attributes['thursday'] = json_encode($value);
    }

    public function setFridayAttribute($value)
    {
        return $this->attributes['friday'] = json_encode($value);
    }

    public function setSaturdayAttribute($value)
    {
        return $this->attributes['saturday'] = json_encode($value);
    }

    public function setSundayAttribute($value)
    {
        return $this->attributes['sunday'] = json_encode($value);
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function persist(array $attributes)
    {
        $attributes['company_id'] = companyId();

        /** @var Schedule $schedule */
        return (new self)->create($attributes);
    }
}

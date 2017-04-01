<?php

namespace App\Models;

class Schedule extends BaseModel
{
    protected $casts = [
        'monday' => 'array',
        'tuesday' => 'array',
        'wednesday' => 'array',
        'thursday' => 'array',
        'friday' => 'array',
        'saturday' => 'array',
        'sunday' => 'array',
    ];

//    public function setMondayAttribute($value)
//    {
//        $this->attributes['monday'] = json_encode($value);
//    }
//
//    public function setTuesdayAttribute($value)
//    {
//        $this->attributes['tuesday'] = json_encode($value);
//    }
//
//    public function setWednesdayAttribute($value)
//    {
//        $this->attributes['wednesday'] = json_encode($value);
//    }
//
//    public function setThursdayAttribute($value)
//    {
//        $this->attributes['thursday'] = json_encode($value);
//    }
//
//    public function setFridayAttribute($value)
//    {
//        $this->attributes['friday'] = json_encode($value);
//    }
//
//    public function setSaturdayAttribute($value)
//    {
//        $this->attributes['saturday'] = json_encode($value);
//    }
//
//    public function setSundayAttribute($value)
//    {
//        $this->attributes['sunday'] = json_encode($value);
//    }
}

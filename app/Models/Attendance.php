<?php

namespace App\Models;

class Attendance extends BaseModel
{
    protected $appends = ['day'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function scopeFrom($query, $date)
    {
        return $query->where('time_in', '>=', $date);
    }

    public function scopeTo($query, $date)
    {
        return $query->where('time_out', '<=', $date);
    }

    public function getDayAttribute()
    {
        return strtolower(carbon($this->date)->format('l'));
    }

    public function getTimeInAttribute($value)
    {
        return strtotime($value);
    }

    public function getTimeOutAttribute($value)
    {
        return strtotime($value);
    }

    public function getScheduleStartAttribute()
    {
        return strtotime($this->schedule->{$this->day}['start']);
    }

    public function getScheduleEndAttribute()
    {
        return strtotime($this->schedule->{$this->day}['end']);
    }

    /**
     * Late in minutes
     *
     * @return mixed
     */
    public function late()
    {
        $lateInMinutes = round(($this->time_in - $this->schedule_start) / 60);

        if ($lateInMinutes <= 0) {
            return 0;
        }

        return $lateInMinutes;
    }

    /**
     * Overtime in minutes
     *
     * @return mixed
     */
    public function overTime()
    {
        $overTimeInMinutes = round(($this->time_out - $this->schedule_end) / 60);

        if ($overTimeInMinutes <= 0) {
            return 0;
        }

        return $overTimeInMinutes;
    }

    /**
     * Regular hours in minutes
     *
     * @return int
     */
    public function regularHours()
    {
        if ($this->time_out < $this->schedule_end) {
            return abs(($this->time_in - $this->time_out) / 60);
        }

        return abs(($this->time_in - $this->schedule_end) / 60);
    }

    /**
     * UnderTime in minutes
     *
     * @return int
     */
    public function underTime()
    {
        $underTimeInMinutes = round(($this->schedule_end - $this->time_out) / 60);

        if ($underTimeInMinutes <= 0) {
            return 0;
        }

        return $underTimeInMinutes;
    }

    public function isRegularHoliday()
    {
        $holiday = Holiday::regular()->where('date', $this->time_in->format('Y-m-d'))->first();

        if (! $holiday) {
            return false;
        }

        return true;
    }

    public function isSpecialHoliday()
    {
        $holiday = Holiday::special()->where('date', $this->time_in->format('Y-m-d'))->first();

        if (! $holiday) {
            return false;
        }

        return true;
    }
}

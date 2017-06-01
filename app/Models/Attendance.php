<?php

namespace App\Models;

class Attendance extends BaseModel
{
    protected $day;

    protected $schedule_start;

    protected $schedule_end;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function scopeFrom($query, $date)
    {
        return $query->where('time_in', '>=', $date);
    }

    public function scopeTo($query, $date)
    {
        return $query->where('time_out', '<=', $date);
    }

    public function getTimeInAttribute($value)
    {
        return strtotime($value);
    }

    public function getTimeOutAttribute($value)
    {
        return strtotime($value);
    }

    /**
     * Late in minutes
     *
     * @return mixed
     */
    public function late()
    {
        $day = $this->day();
        $schedule = strtotime($this->schedule->$day['start']);
        $lateInMinutes = round(($this->time_in - $schedule) / 60);

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
        $day = $this->day();
        $schedule = strtotime($this->schedule->$day['end']);
        $overTimeInMinutes = round(($this->time_out - $schedule) / 60);

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
        $day = $this->day();
        $schedule = strtotime($this->schedule->$day['end']);

        if ($this->time_out < $schedule) {
            return abs(($this->time_in - $this->time_out) / 60);
        }

        return abs(($this->time_in - $schedule) / 60);
    }

    /**
     * UnderTime in minutes
     *
     * @return int
     */
    public function underTime()
    {
        $day = $this->day();
        $schedule = strtotime($this->schedule->$day['end']);
        $underTimeInMinutes = round(($schedule - $this->time_out) / 60);

        if ($underTimeInMinutes <= 0) {
            return 0;
        }

        return $underTimeInMinutes;
    }

    /**
     * Get the day of the attendance record
     * 'sunday'|'monday'|'tuesday'|'wednesday'|'thursday'|'friday'|'saturday'
     *
     * @return string
     */
    public function day()
    {
        return strtolower(carbon($this->date)->format('l'));
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

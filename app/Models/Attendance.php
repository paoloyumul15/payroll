<?php

namespace App\Models;

class Attendance extends BaseModel
{
    protected $day;

    protected $date;

    protected $schedule_start;

    protected $schedule_end;

    protected $dates = [
        'time_in',
        'time_out',
    ];

    /**
     * Get the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFrom($query, $date)
    {
        return $query->where('time_in', '>=', $date);
    }

    public function scopeTo($query, $date)
    {
        return $query->where('time_out', '<=', $date);
    }

    /**
     * Late in minutes
     *
     * @return mixed
     */
    public function late()
    {
        $this->prepare();

        if ($this->time_in->gt($this->schedule_start)) {
            return $this->time_in->diffInMinutes($this->schedule_start);
        }

        return 0;
    }

    /**
     * Overtime in minutes
     *
     * @return mixed
     */
    public function overTime()
    {
        $this->prepare();

        if ($this->time_out->gt($this->schedule_end)) {
            return $this->time_out->diffInMinutes($this->schedule_end);
        }

        return 0;
    }

    /**
     * Regular hours in minutes
     *
     * @return int
     */
    public function regularHours()
    {
        $this->prepare();

        if ($this->time_out->lt($this->schedule_end)) {
            return $this->time_in->diffInMinutes($this->time_out);
        }

        return $this->time_in->diffInMinutes($this->schedule_end);
    }

    /**
     * UnderTime in minutes
     *
     * @return int
     */
    public function underTime()
    {
        $this->prepare();

        if ($this->time_out->lt($this->schedule_end)) {
            return $this->time_out->diffInMinutes($this->schedule_end);
        }

        return 0;
    }

    /**
     * Get the date of the attendance record
     * '2017-04-01'
     *
     * @return string
     */
    public function date()
    {
        return $this->time_in->format('Y-m-d');
    }

    /**
     * Get the day of the attendance record
     * 'Sunday'|'Monday'|'Tuesday'|'Wednesday'|'Thursday'|'Friday'|'Saturday'
     *
     * @return string
     */
    public function day()
    {
        return $this->time_in->format('l');
    }

    /**
     * Get the day, date and the right schedule of the attendance record
     *
     * @return array
     */
    private function prepare()
    {
        $this->day = $day = strtolower($this->day());

        $this->date = $this->date();

        $this->schedule_start = carbon(
            $this->date .' '. $this->user->schedule->$day['start']
        );

        $this->schedule_end = carbon(
            $this->date .' '. $this->user->schedule->$day['end']
        );
    }
}

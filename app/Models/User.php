<?php

namespace App\Models;

use App\eSweldo\Computations\Payroll;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'employee_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Hash the user password when setting it
     *
     * @param  string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Generate a path for a user
     *
     * @return string
     */
    public function path()
    {
        return '/employees/' . $this->id;
    }

    /**
     * Get the user's profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the user's schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'user_id');
    }

    /**
     * Name of the user
     *
     * @return string
     */
    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Create the user with the profile
     *
     * @param array $attributes
     * @return mixed
     */
    public static function persist(array $attributes)
    {
        $attributes['company_id'] = companyId();

        return DB::transaction(function () use ($attributes) {
            /** @var User $user */
            $user = (new self)->create($attributes);

            $user->profile()->create($attributes);

            return $user;
        });
    }

    /**
     * Get the users from the same company as the signed-in user
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSameCompany(Builder $query)
    {
        return $query->where('company_id', companyId());
    }

    /**
     * Check if the user has profile
     *
     * @return bool
     */
    public function hasProfile()
    {
        return ! ! $this->profile;
    }

    /**
     * Payroll of the user from a pay period
     *
     * @param PayPeriod $payPeriod
     * @return Payroll
     */
    public function payroll(PayPeriod $payPeriod)
    {
        return (new Payroll($this))->handle($payPeriod);
    }

    /**
     * Regular working hours from a certain period
     *
     * @param $start_date
     * @param $end_date
     * @return float|int
     */
    public function regularHours($start_date, $end_date)
    {
        $attendances = Attendance::from($start_date)->to($end_date)->get();

        var_dump($end_date);
        /** @var Collection $attendances */
        return $attendances->reduce(function($carry, $attendance) {
            /** @var Attendance $attendance */
            return $carry + $attendance->regularHours();
        }, 0) / 60;
    }
}

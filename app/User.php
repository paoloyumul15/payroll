<?php

namespace App;

use App\Models\Profile;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
     * @param  string  $value
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
     * Create the user with the profile
     *
     * @param array $attributes
     * @return mixed
     */
    public static function createProfile(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            /** @var User $user */
            $user = (new self)->create($attributes);

            $user->profile()->create($attributes + ['status' => 'Active']);

            return $user;
        });
    }
}

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Attendance;
use App\Models\Company;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\PayPeriod;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\User;

$factory->define(Company::class, function (Faker\Generator $fake) {
    return [
        'name' => $fake->company,
    ];
});

$factory->define(User::class, function (Faker\Generator $fake) {
    return [
        'company_id' => function () {
            return factory(Company::class)->create()->id;
        },
        'employee_id' => $fake->unique()->numberBetween(10000, 99999),
        'first_name' => $fake->firstName,
        'middle_name' => $fake->lastName,
        'last_name' => $fake->lastName,
        'email' => $fake->unique()->safeEmail,
        'password' => Hash::make('p@ssw0rd'),
        'remember_token' => str_random(10),
        'type' => $fake->randomElement(['Admin', 'Employee']),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
});

$factory->define(Profile::class, function (Faker\Generator $fake) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'age' => $fake->numberBetween(18, 100),
        'gender' => $fake->randomElement(['M', 'F']),
        'birth_date' => date('Y-m-d'),
        'civil_status' => $fake->randomElement(['SI', 'MA', 'SE', 'DI', 'WI']),
        'place_of_birth' => $fake->city,
        'address' => $fake->address,
        'telephone_number' => $fake->phoneNumber,
        'mobile_number' => $fake->phoneNumber,
        'date_hired' => date('Y-m-d'),
        'date_end' => date('Y-m-d'),
        'sss_number' => $fake->numberBetween(1000000, 9999999),
        'phil_health_number' => $fake->numberBetween(1000000, 9999999),
        'pagibig_number' => $fake->numberBetween(1000000, 9999999),
        'tin_number' => $fake->numberBetween(1000000, 9999999),
        'account_number' => $fake->numberBetween(1000000, 9999999),
        'status' => 'Active',
        'rate' => 0,
    ];
});

$factory->define(PayPeriod::class, function (Faker\Generator $fake) {
    $now = carbon($fake->date('Y-m-d H:i:s'));
    $fifteenDays = $now->addDays(15);

    return [
        'company_id' => function () {
            return factory(Company::class)->create()->id;
        },
        'start_date' => $now,
        'end_date' => $fifteenDays,
        'pay_out_date' => $fifteenDays,
    ];
});

$factory->define(Schedule::class, function (Faker\Generator $fake) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'monday' => ['start' => '8:00:00', 'end' => '18:00:00'],
        'tuesday' => ['start' => '8:00:00', 'end' => '18:00:00'],
        'wednesday' => ['start' => '8:00:00', 'end' => '18:00:00'],
        'thursday' => ['start' => '8:00:00', 'end' => '18:00:00'],
        'friday' => ['start' => '8:00:00', 'end' => '18:00:00'],
        'saturday' => ['start' => '8:00:00', 'end' => '18:00:00'],
        'sunday' => ['start' => '8:00:00', 'end' => '18:00:00'],
    ];
});

$factory->define(Attendance::class, function (Faker\Generator $fake) {
    $time_in = carbon(date('Y-m-d'))->addHours(8);

    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'time_in' => $time_in,
        'time_out' => $time_in->addHours(10),
    ];
});

$factory->define(Leave::class, function (Faker\Generator $fake) {
    $startDate = carbon(date('Y-m-d'))->addHours(8);

    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'start_date' => $startDate,
        'end_date' => $startDate->addDays(2),
        'status' => 'Approved',
        'created_at' => date('Y-m-d H:i:s'),
    ];
});


$factory->define(Holiday::class, function (Faker\Generator $fake) {
    return [
        'date' => '2017-01-01',
        'name' => 'New Year',
        'type' => 'RH',
    ];
});

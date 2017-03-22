<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Company;
use App\Models\Profile;
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
    ];
});

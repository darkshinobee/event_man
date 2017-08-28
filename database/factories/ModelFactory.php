<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'hits' => rand(0,50),
        'misses' => rand(0,20),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => 'admin@ticketroom.ng',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->company.' '.$faker->companySuffix,
        'venue' => $faker->address,
        'category' => $faker->word,
        'organizer_id' => $faker->numberBetween($min = 1, $max = 20),
        'event_type' => $faker->boolean($chanceOfGettingTrue = 50),
        'regular_fee' => $faker->numberBetween($min = 1000, $max = 10000),
        'hits' => $faker->numberBetween($min = 0, $max = 50),
        'misses' => $faker->numberBetween($min = 0, $max = 20),
        'slug' => $faker->unique()->word,
        'age_rating' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});

$factory->define(App\BookedEvent::class, function (Faker\Generator $faker) {
    return [
        'event_id' => $faker->numberBetween($min = 1, $max = 10),
        'attendee_id' => $faker->numberBetween($min = 1, $max = 20),
        'ticket_type' => $faker->word,
        'amount' => $faker->numberBetween($min = 1000, $max = 10000),
        'quantity' => $faker->numberBetween($min = 1, $max = 5),
    ];
});

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
        'password' => $password ?: $password = bcrypt('123456'),
        // 'hits' => rand(0,50),
        // 'misses' => rand(0,20),
        // 'remember_token' => str_random(10),
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
        'title' => 'Event Number '.$faker->unique()->numberBetween($min = 1, $max = 10),
        'venue' => $faker->address,
        'state' => 'Abuja',
        'description' => $faker->text($maxNbChars = 200),
        'category' => 'party',
        'organizer' => $faker->company,
        'organizer_id' => 1,
        'event_type' => 0,
        'ticket_count' => 50,
        // 'early_bird' => 2500,
        // 'early_max' => $faker->numberBetween($min = 50, $max = 200),
        // 'regular_fee' => 5000,
        // 'regular_max' => $faker->numberBetween($min = 50, $max = 200),
        // 'vip_fee' => 10000,
        // 'vip_max' => $faker->numberBetween($min = 50, $max = 200),
        // 'hits' => $faker->numberBetween($min = 0, $max = 50),
        // 'misses' => $faker->numberBetween($min = 0, $max = 20),
        'slug' => $faker->unique()->word,
        'image_path' => '/images/defaults/party.jpg',
        // 'age_rating' => $faker->boolean($chanceOfGettingTrue = 50),
        'event_start_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'event_start_time' => $faker->time($format = 'H:i'),
    ];
});

$factory->define(App\BookedEvent::class, function (Faker\Generator $faker) {
    return [
        'transaction_id' => 3,
        'ticket_type' => $faker->numberBetween($min = 0, $max = 3),
        'amount' => $faker->numberBetween($min = 1000, $max = 100000),
        'quantity' => $faker->numberBetween($min = 1, $max = 5),
        'booking_status' => 1,
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
    return [
        'event_id' => 12,
        'attendee_id' => $faker->numberBetween($min = 1, $max = 10),
        'reference' => $faker->md5,
    ];
});

$factory->define(App\EventOrganizer::class, function (Faker\Generator $faker) {
    return [
        'event_id' => 4,
        'organizer_id' => 1,
    ];
});

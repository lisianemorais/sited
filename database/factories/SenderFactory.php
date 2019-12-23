<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\AccountType;
use App\Model\Bank;
use Faker\Generator as Faker;

$factory->define(\App\Model\Sender::class, function (Faker $faker) {
    $banks = Bank::all()->pluck('id');
    $accountTypes = AccountType::all()->pluck('id');

    return [
        'agency' => $faker->randomNumber(4),
        'account' => $faker->numberBetween(1000000000, 9999999999),
        'name'=> $faker->name,
        'document'=> $faker->numberBetween(10000000000, 99999999999),
        'banks_id'=> $faker->randomElement($banks),
        'account_types_id' =>$faker->randomElement($accountTypes),
    ];
});

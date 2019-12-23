<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Purpose;
use App\Model\Receiver;
use App\Model\Sender;
use Faker\Generator as Faker;

$factory->define(\App\Model\Ted::class, function (Faker $faker) {
    $receiver = Receiver::all()->pluck('id');
    $sender = Sender::all()->pluck('id');
    $purpose = Purpose::all()->pluck('id');

    return [
        'sender_id' => $faker->randomElement($sender),
        'receiver_id' => $faker->randomElement($receiver),
        'purpose_id' => $faker->randomElement($purpose),
        'description' => $faker->sentence,
        'amount' => $faker->randomFloat(),
        'tax' => $faker->randomFloat(),
        'date' => $faker->dateTime()
    ];
});

/*

$factory->define(\App\Model\Sender::class, function (Faker $faker) {
    $banks = Bank::all()->pluck('id');
    $accountTypes = AccountType::all()->pluck('id');
            
    $table->unsignedBigInteger('senders_id');
            $table->unsignedBigInteger('receivers_id');
            $table->unsignedBigInteger('purposes_id');
            $table->string('description');
            $table->decimal('amount', 10,2);
            $table->decimal('tax', 10,2);
            $table->timestamp('date');
    return [
        'agency' => $faker->randomNumber(4),
        'account' => $faker->numberBetween(1000000000, 9999999999),
        'name'=> $faker->name,
        'document'=> $faker->numberBetween(10000000000, 99999999999),
        'banks_id'=> $faker->randomElement($banks),
        'account_types_id' =>$faker->randomElement($accountTypes),
    ];
});

*/

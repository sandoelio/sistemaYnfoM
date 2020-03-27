<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\aluno;
use Faker\Generator as Faker;

$factory->define(aluno::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'cpf' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Department::class, function (Faker $faker) {
    $name = $faker->word;
	return [
        'name' => $name,
		'slug' => str_slug($name)
    ];
});

$factory->define(App\Role::class, function (Faker $faker) {
    $name = $faker->jobTitle;
	return [
        'name' => $name,
		'slug' => str_slug($name),
		'salary' => $faker->numberBetween($min = 1000, $max = 5000),
		'department_id' => function(){
			return factory(App\Department::class)->create()->id;
		}
    ];
});


$factory->define(App\Employee::class, function (Faker $faker) {
    $name = $faker->name;
	return [
        'name' => $name,
		'slug' =>str_slug($name),
        'email' => $faker->unique()->safeEmail,
        'street' => $faker->streetAddress,
		'town' => $faker->streetName,
		'city' => $faker->state,
		'country' => $faker->country,
		'full_time' => $faker->randomElement($array = array ('1','0')),
		'role_id' => function(){
			return factory(App\Role::class)->create()->id;
		}
    ];
});

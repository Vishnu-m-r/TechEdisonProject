<?php

use Illuminate\Database\Seeder;

class EmailDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 20; $i++) { 
        	DB::table('emails')->insert(['name' => $faker->name, 'email' => $faker->unique()->email]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Passenger;

class PassengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $samples_temp = [];

        for($i = 0; $i < 50; $i++)
        {
            
            $samples_temp[] = [            
                'name_1'   		=> $faker->firstName,
                'lName_1'       => $faker->lastName,
                'lName_2' 		=> $faker->lastName,
                'Nationality'	=> 'Nacionalidad',
                'email'			=> $faker->unique->email ,
                'university'    => $faker->company,
                'country_o'		=> 1,
                'country_r'		=> 2,
            ];

        }

        Passenger::insert($samples_temp);






    }
}

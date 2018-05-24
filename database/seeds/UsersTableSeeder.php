<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user = new User();

        $user->rut 					= '111111111-1';
        $user->type 				= 'admin';
        $user->name_1				= 'Leo';
        $user->name_2			    = 'Aristides';
        $user->lName_1 				= 'Caloguerea';
        $user->lName_2 				= 'Farias';
        $user->confirmed	        = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department	        = 'Developer';
        $user->email                = 'l.caloguerea@gmail.com';
        $user->phone 				= '+56966080281';
        $user->password             = 'cip2laravel55';
            
        $user->save();
        $samples_temp = [];

        for($i = 0; $i < 150; $i++)
        {
            
            $samples_temp[] = [            
            	'rut'			=> $faker->isbn10,
            	'type'			=> 'user',
                'name_1' 		=> $faker->firstName,
                'name_2' 		=> $faker->firstName,
                'lName_1'		=> $faker->lastName,
                'lName_2'		=> $faker->lastName,
                'confirmed'		=> $faker->randomElement(['yes', 'no']),
                'confirmed_code'=> str_random(),
                'department'	=> $faker->jobTitle.' Department',
                'email'			=> $faker->unique->email ,
                'phone'			=> $faker->e164PhoneNumber,
                'password'		=> bcrypt('secret') 
            ];

        }

        User::insert($samples_temp);






    }
}

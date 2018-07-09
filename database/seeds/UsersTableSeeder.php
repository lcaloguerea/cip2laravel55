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
        $user->name				    = 'Leo';
        $user->lName 				= 'Caloguerea';
        $user->confirmed	        = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department	        = 'Developer';
        $user->email                = 'l.caloguerea@gmail.com';
        $user->phone 				= '+56966080281';
        $user->password             = bcrypt('cip2laravel55');
        $user->uAvatar              = '/img/dimebag.jpg';
            
        $user->save();
        $samples_temp = [];

        for($i = 0; $i < 150; $i++)
        {
            
            $samples_temp[] = [            
            	'rut'			=> $faker->isbn10,
            	'type'			=> 'user',
                'name'   		=> $faker->firstName,
                'lName' 		=> $faker->lastName,
                'confirmed'		=> $faker->randomElement(['yes', 'no']),
                'confirmed_code'=> str_random(),
                'department'	=> $faker->jobTitle.' Department',
                'email'			=> $faker->unique->email ,
                'phone'			=> $faker->e164PhoneNumber,
                'password'		=> bcrypt('secret'),
                'uAvatar'       => '/img/icons/icon-user.png' 
            ];

        }

        User::insert($samples_temp);






    }
}

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
        $user->department	        = 'CIP';
        $user->email                = 'l.caloguerea@gmail.com';
        $user->phone 				= '+56966080281';
        $user->password             = bcrypt('cip2laravel55');
        $user->uAvatar              = '/img/dimebag.jpg';
            
        $user->save();

        $user = new User();

        $user->rut                  = '222222222-2';
        $user->type                 = 'user';
        $user->name                 = 'Patricia';
        $user->lName                = 'Sánchez';
        $user->confirmed            = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department           = 'CIP';
        $user->email                = 'patriciaximenasanchez@gmail.com';
        $user->phone                = '+56632211136';
        $user->password             = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
            
        $user->save();

        $user = new User();

        $user->rut                  = '222222222-3';
        $user->type                 = 'user';
        $user->name                 = 'Rodrigo';
        $user->lName                = 'Browne';
        $user->confirmed            = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department           = 'CIP';
        $user->email                = 'rodrigobrowne@uach.cl';
        $user->phone                = '+56612312312';
        $user->password             = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
        $user->uAvatar              = '/img/team-img/Rodrigo-Browne.jpg';
            
        $user->save();

        $user = new User();

        $user->rut                  = '222222222-4';
        $user->type                 = 'user';
        $user->name                 = 'Carolina';
        $user->lName                = 'Díaz';
        $user->confirmed            = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department           = 'CIP';
        $user->email                = 'cip_reservas@uach.cl';
        $user->phone                = '+56989209785';
        $user->password             = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
            
        $user->save();

        $user = new User();

        $user->rut                  = '222222222-5';
        $user->type                 = 'user';
        $user->name                 = 'Elizabeth';
        $user->lName                = 'Robles';
        $user->confirmed            = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department           = 'CIP';
        $user->email                = 'elizabethroblesazocar84@gmail.com';
        $user->phone                = '+5663321233';
        $user->password             = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';

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
                'department'	=> $faker->randomElement([
                    'Arquitectura y artes',
                    'Ciencias',
                    'Ciencias agrarias',
                    'Cs. Económicas y administrativas',
                    'Cs. Forestales y recursos naturales',
                    'Cs. Jurídicas y sociales',
                    'Ciencias veterinarias',
                    'Ciencias de la ingeniería',
                    'Filosofía y humanidades',
                    'Medicina']),
                'email'			=> $faker->unique->email ,
                'phone'			=> $faker->e164PhoneNumber,
                'password'		=> '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'uAvatar'       => '/img/icons/icon-user.png',
                'created_at'    => DB::raw('CURRENT_TIMESTAMP')
            ];

        }

        User::insert($samples_temp);






    }
}

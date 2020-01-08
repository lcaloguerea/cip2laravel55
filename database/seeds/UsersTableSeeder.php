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

        $user->rut 					= '11.111.111-1';
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

        $user->rut                  = '22.222.222-2';
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

        $user->rut                  = '33.333.333-3';
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

        $user->rut                  = '44.444.444-4';
        $user->type                 = 'user';
        $user->name                 = 'Carolina';
        $user->lName                = 'Díaz';
        $user->confirmed            = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department           = 'CIP';
        $user->email                = 'carolinadiaz@uach.cl';
        $user->phone                = '+56989209785';
        $user->password             = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
            
        $user->save();

        $user = new User();

        $user->rut                  = '55.555.555-5';
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

        $user = new User();

        $user->rut                  = '66.666.666-5';
        $user->type                 = 'maid';
        $user->name                 = 'Maid';
        $user->lName                = 'CIP';
        $user->confirmed            = 'yes';
        $user->confirmed_code       =  str_random();
        $user->department           = 'CIP';
        $user->email                = 'maidcip@gmail.com';
        $user->phone                = '+5665351233';
        $user->password             = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';

        $user->save();
    }
}

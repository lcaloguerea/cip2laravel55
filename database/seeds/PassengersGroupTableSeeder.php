<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Passenger;
use App\PassengerGroup;

class PassengersGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 1;
        $pGroup->passenger_id             = 1;
        $pGroup->save(); 

        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 2;
        $pGroup->passenger_id             = 2;
        $pGroup->save(); 

        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 3;
        $pGroup->passenger_id             = 3;
        $pGroup->save(); 

        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 4;
        $pGroup->passenger_id             = 4;
        $pGroup->save(); 

        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 4;
        $pGroup->passenger_id             = 5;
        $pGroup->save(); 

        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 5;
        $pGroup->passenger_id             = 6;
        $pGroup->save(); 

        $pGroup = new PassengerGroup();

        $pGroup->reservation_id           = 5;
        $pGroup->passenger_id             = 7;
        $pGroup->save();

        $pGroup = new PassengerGroup(); 

        $pGroup->reservation_id           = 6;
        $pGroup->passenger_id             = 8;
        $pGroup->save(); 

    }
}

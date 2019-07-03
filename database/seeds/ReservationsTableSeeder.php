<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $today = date("Y-m-d");

        $reserv = new Reservation();

        $reserv->motive       = 'testing reservation system';
        $reserv->program      = 'testing program';
        $reserv->status       = 'started';
        $reserv->confirmed    = 'confirmed';
        $reserv->check_in     = $today;
        $reserv->check_out    = date('Y-m-d', strtotime($today. ' + 5 days'));
        $reserv->roomType     = "single";
        $reserv->room_id      = 1;
        $reserv->user_id      = 2;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive2';
        $reserv->program      = 'program2';
        $reserv->confirmed    = 'confirmed';
        $reserv->status       = 'finished';
        $reserv->check_in     = date('2019-03-20');
        $reserv->check_out    = date('2019-03-23');
        $reserv->roomType     = "single";
        $reserv->room_id      = 2;
        $reserv->user_id      = 3;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive3';
        $reserv->program      = 'program3';
        $reserv->confirmed    = 'cancellByUser';
        $reserv->status       = 'cancelled';
        $reserv->check_in     = date('2019-03-20');
        $reserv->check_out    = date('2019-03-28');
        $reserv->roomType     = "single";
        $reserv->room_id      = 1;
        $reserv->user_id      = 4;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive4';
        $reserv->program      = 'program4';
        $reserv->confirmed    = 'confirmed';
        $reserv->status       = 'started';
        $reserv->check_in     = date('2019-03-15');
        $reserv->check_out    = date('2019-03-30');
        $reserv->roomType     = "matrimonial";
        $reserv->room_id      = 5;
        $reserv->user_id      = 5;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive5';
        $reserv->program      = 'program5';
        $reserv->confirmed    = 'confirmed';
        $reserv->status       = 'waiting';
        $reserv->check_in     = date('2019-03-28');
        $reserv->check_out    = date('2019-03-31');
        $reserv->roomType     = "matrimonial";
        $reserv->room_id      = 8;
        $reserv->user_id      = 5;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive6';
        $reserv->program      = 'program6';
        $reserv->confirmed    = 'confirmed';
        $reserv->status       = 'waiting';
        $reserv->check_in     = date('2019-03-28');
        $reserv->check_out    = date('2019-03-31');
        $reserv->roomType     = "matrimonial";
        $reserv->room_id      = 7;
        $reserv->user_id      = 5;

        $reserv->save();
    }
}

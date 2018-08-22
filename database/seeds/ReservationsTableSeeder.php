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

        $reserv->motive       = 'testing reservation sistem';
        $reserv->program      = 'testing program';
        $reserv->status       = 'started';
        $reserv->check_in     = $today;
        $reserv->check_out    = date('Y-m-d', strtotime($today. ' + 5 days'));
        $reserv->room_id      = 1;
        $reserv->user_id      = 2;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive2';
        $reserv->program      = 'program2';
        $reserv->status       = 'finished';
        $reserv->check_in     = date('2018-07-20');
        $reserv->check_out    = date('2018-07-23');
        $reserv->room_id      = 2;
        $reserv->user_id      = 3;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive3';
        $reserv->program      = 'program3';
        $reserv->status       = 'cancelled';
        $reserv->check_in     = date('2018-07-20');
        $reserv->check_out    = date('2018-07-28');
        $reserv->room_id      = 1;
        $reserv->user_id      = 4;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive4';
        $reserv->program      = 'program4';
        $reserv->status       = 'started';
        $reserv->check_in     = date('2018-07-20');
        $reserv->check_out    = date('2018-07-26');
        $reserv->room_id      = 5;
        $reserv->user_id      = 5;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive5';
        $reserv->program      = 'program5';
        $reserv->status       = 'waiting';
        $reserv->check_in     = date('2018-07-28');
        $reserv->check_out    = date('2018-07-31');
        $reserv->room_id      = 8;
        $reserv->user_id      = 5;

        $reserv->save();

        $reserv = new Reservation();

        $reserv->motive       = 'motive6';
        $reserv->program      = 'program6';
        $reserv->status       = 'waiting';
        $reserv->check_in     = date('2018-07-25');
        $reserv->check_out    = date('2018-07-28');
        $reserv->room_id      = 3;
        $reserv->user_id      = 5;

        $reserv->save();
    }
}

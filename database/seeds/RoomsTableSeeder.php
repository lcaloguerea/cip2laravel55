<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room(); //M1

        $room->price                    = 40000;
        $room->status                   = 'free';
        $room->type                     = 'matrimonial';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();  

        $room = new Room(); //S1

        $room->price                    = 30000;
        $room->status                   = 'free';
        $room->type                     = 'single';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();

        $room = new Room(); //C1

        $room->price                    = 35000;
        $room->status                   = 'free';
        $room->type                     = 'shared';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();

        $room = new Room(); //M2

        $room->price                    = 40000;
        $room->status                   = 'free';
        $room->type                     = 'matrimonial';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();

        $room = new Room(); //M3

        $room->price                    = 40000;
        $room->status                   = 'free';
        $room->type                     = 'matrimonial';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();

        $room = new Room(); //M4

        $room->price                    = 40000;
        $room->status                   = 'free';
        $room->type                     = 'matrimonial';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();  

        $room = new Room(); //S2

        $room->price                    = 30000;
        $room->status                   = 'free';
        $room->type                     = 'single';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();

        $room = new Room(); //S3

        $room->price                    = 30000;
        $room->status                   = 'free';
        $room->type                     = 'single';
        $room->sanitization             = 'done';
        $room->active_reservation_id    = null;
        $room->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PassengersTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(PassengersGroupTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(MaintenanceTableSeeder::class);

    }
}

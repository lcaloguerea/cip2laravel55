<?php

use JeroenZwart\CsvSeeder\CsvSeeder;
use Carbon\Carbon;

class HResTableSeeder extends CsvSeeder
{
	public function __construct()
    {
        $this->file = '/public/CVS/hres.csv';
        $this->encode = false;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::disableQueryLog();
	    parent::run();
    }
}

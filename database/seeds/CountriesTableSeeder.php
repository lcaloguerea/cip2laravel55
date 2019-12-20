<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run() 
	{
		DB::table('countries')->delete();
		$countries = file_get_contents('https://restcountries.eu/rest/v2/all');
        $countries = json_decode($countries, true);
        foreach($countries as $c){
        	$Country = new Country();

        	$Country->name 			= $c['name'];
        	$Country->nameTrans 	= $c['translations']['es'];
        	$Country->iso 			= $c['alpha2Code'];
        	$Country->iso3 			= $c['alpha3Code'];
        	$Country->nationality 	= $c['demonym'];
        	$Country->flag 			= $c['flag'];

        	$Country->save();

        }
	}
}
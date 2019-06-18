<?php

use Illuminate\Database\Seeder;
use App\Maintenance;

class MaintenanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$today = date("Y-m-d");

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Aromatizadores tarros';
        $maintenance->periodicity   = 'monthly';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 month'));
        $maintenance->save();

 		$maintenance = new Maintenance();

        $maintenance->name       	= 'Bidones agua purificada';
        $maintenance->periodicity     = 'monthly';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 month'));
        $maintenance->save();

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Fumigación';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Lavado de cortina';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Limpieza ext. vidrios';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save(); 
        
		$maintenance = new Maintenance();

        $maintenance->name       	= 'Mantención A/C';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();

 		$maintenance = new Maintenance();

        $maintenance->name       	= 'Mantención pintura';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Recarga extintores';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Revisión eléctrica/gasfiteria';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();

		$maintenance = new Maintenance();

        $maintenance->name       	= 'Sanitización baños';
        $maintenance->periodicity     = 'annual';
        $maintenance->status        = 'done';
        $maintenance->deadline	    = date('Y-m-d', strtotime($today. ' + 1 year'));
        $maintenance->save();                       
    }
}

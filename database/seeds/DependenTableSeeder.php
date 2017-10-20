<?php

use Illuminate\Database\Seeder;

class DependenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Dependen::create([

        	'nombredepen' =>'Admistrativa'
        ]);

        App\Dependen::create([

        	'nombredepen' =>'Contratos'
        ]);

         App\Dependen::create([

        	'nombredepen' =>'Servicios Admin'
        ]);

         App\Dependen::create([

        	'nombredepen' =>'Comedores'
        ]);

          App\Dependen::create([

        	'nombredepen' =>'Cads'
        ]);

         App\Dependen::create([

        	'nombredepen' =>'Soga'
        ]);

          App\Dependen::create([

        	'nombredepen' =>'Tesoreria'
        ]);

           App\Dependen::create([

        	'nombredepen' =>'Tecnologia'
        ]);

            App\Dependen::create([

        	'nombredepen' =>'Contabilid'
        ]);

             App\Dependen::create([

        	'nombredepen' =>'Gestion Documental'
        ]);

              App\Dependen::create([

        	'nombredepen' =>'Negocios Especiales'
        ]);

             App\Dependen::create([

        	'nombredepen' =>'Cartera'
        ]);
    }
}

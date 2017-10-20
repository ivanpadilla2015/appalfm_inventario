<?php

use Illuminate\Database\Seeder;

class ElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Element::create([

        	'nombrelement' =>'Licencia Office 2016'
        ]);

          App\Element::create([

        	'nombrelement' =>'Licencia Office 2013'
        ]);

           App\Element::create([

        	'nombrelement' =>'Licencia Office 2010'
        ]);

            App\Element::create([

        	'nombrelement' =>'Licencia Office 2007'
        ]);

            App\Element::create([

        	'nombrelement' =>'Licencia Windows Xp'
        ]);

             App\Element::create([

        	'nombrelement' =>'Licencia Windows Vista'
        ]);

              App\Element::create([

        	'nombrelement' =>'Licencia Windows 8'
        ]);

               App\Element::create([

        	'nombrelement' =>'Licencia Windows 10'
        ]);

                App\Element::create([

        	'nombrelement' =>'Estabilizador'
        ]);

                 App\Element::create([

        	'nombrelement' =>'Portatil'
        ]);

                  App\Element::create([

        	'nombrelement' =>'Ups'
        ]);

                   App\Element::create([

        	'nombrelement' =>'Planta Electrica'
        ]);

                    App\Element::create([

        	'nombrelement' =>'Planta Telefonica'
        ]);

                     App\Element::create([

        	'nombrelement' =>'Fotocopiadora'
        ]);

                     App\Element::create([

        	'nombrelement' =>'Impresora'
        ]);

                     App\Element::create([

        	'nombrelement' =>'Pc All One'
        ]);

                      App\Element::create([

        	'nombrelement' =>'Teclado'
        ]);

                       App\Element::create([

        	'nombrelement' =>'Mouse'
        ]);

             App\Element::create([

        	'nombrelement' =>'Torre Pc'
        ]);

               App\Element::create([

        	'nombrelement' =>'Pantalla Pc'
        ]);



        
    }
}

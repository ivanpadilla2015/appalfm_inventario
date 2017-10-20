<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class)->create([
         		'name' => 'Ivan Padilla',
         		'email' => 'ivanpadillamol@gmail.com',
		        'password' => bcrypt('nilson123'),
		        'telefono' => '3017886609',
         	]);
         
         factory(App\User::class, 49)->create();
    }
}

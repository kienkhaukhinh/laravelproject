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
         DB::table('users')->insert([
         	[
			'username'       => 'superadmin',
			'email'      => str_random(17).'@gmail.com',
			'password'   => bcrypt('secret'),
			'level'      => 1,
			'created_at' => new DateTime(),
      	  ],
           
         	[
			'username'       => 'admin',
			'email'      => str_random(17).'@gmail.com',
			'password'   => bcrypt('secret'),
			'level'      => 1,
			'created_at' => new DateTime(),
        ],
          
         	[
			'username'       => 'member',
			'email'      => str_random(17).'@gmail.com',
			'password'   => bcrypt('secret'),
			'level'      => 2,
			'created_at' => new DateTime(),
        ],
  		 
         	[
			'username'       => 'user',
			'email'      => str_random(17).'@gmail.com',
			'password'   => bcrypt('secret'),
			'level'      => 2,
			'created_at' => new DateTime(),
        ]
        ]);
    }
}

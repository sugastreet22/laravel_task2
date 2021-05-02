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
        DB::table("users")->insert([
			['id'           => 1 ,
			'name'          => '管理者' ,
			'email'         => 'aaaaa@gmail.com' ,
			'password'      => '11111111' ,
			'role'          => 1
            ],
			['id'           => 2 ,
			'name'          => '発注社員' ,
			'email'         => 'bbbbb@gmail.com' ,
			'password'      => '22222222' ,
			'role'          => 2
            ],
			['id'           => 3 ,
			'name'          => '受注者' ,
			'email'         => 'ccccc@gmail.com' ,
			'password'      => '33333333' ,
			'role'          => 3
            ]
        ]);

    }
}

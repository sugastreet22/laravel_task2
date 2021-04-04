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
			'name'  => 'コアラのマーチ' ,
			'email'     => 'aaaaa@gmail.com' ,
			'password'     => '11111111'
            ],
			['id'           => 2 ,
			'name'  => 'ポッキー' ,
			'email'     => 'bbbbb@gmail.com' ,
			'password'     => '22222222'
            ],
			['id'           => 3 ,
			'name'  => 'じゃがりこ' ,
			'email'     => 'ccccc@gmail.com' ,
			'password'     => '33333333'
            ],
			['id'           => 4 ,
			'name'  => 'おっとっと' ,
			'email'     => 'ddddd@gmail.com' ,
			'password'     => '44444444'
            ],
			['id'           => 5 ,
			'name'  => 'かっぱえびせん' ,
			'email'     => 'eeeee@gmail.com' ,
			'password'     => '55555555'
            ]
        ]);

    }
}

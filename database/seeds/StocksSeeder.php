<?php

use Illuminate\Database\Seeder;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("stocks")->insert([
			['id'           => 1 ,
			'name'  => 'コアラのマーチ' ,
			'quantity'     => '0' ,
			'price'     => '130',
            // 'user_id'   => '1',
            ],
			['id'           => 2 ,
			'name'  => 'ポッキー' ,
			'quantity'     => '0' ,
			'price'     => '150',
            // 'user_id'   => '2',
            ],
			['id'           => 3 ,
			'name'  => 'じゃがりこ' ,
			'quantity'     => '0' ,
			'price'     => '140',
            // 'user_id'   => '3',
            ],
			['id'           => 4 ,
			'name'  => 'おっとっと' ,
			'quantity'     => '0' ,
			'price'     => '100',
            // 'user_id'   => '4',
            ],
			['id'           => 5 ,
			'name'  => 'かっぱえびせん' ,
			'quantity'     => '0' ,
			'price'     => '120',
            // 'user_id'   => '5',
            ]
        ]);
    }
}

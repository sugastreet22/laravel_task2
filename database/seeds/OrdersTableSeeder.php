<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("orders")->insert([
			['id'               => 1 ,
			'name'              => 'コアラのマーチ' ,
			'quantity'          => 0 ,
			'total_price'       => 130 ,
			'order_status'      => '発注状態',
            // 'user_id'        => '1',
            ],
			['id'               => 2 ,
			'name'              => 'ポッキー' ,
			'quantity'          => 0 ,
			'total_price'       => 150 ,
			'order_status'      => '発注状態',
            // 'user_id'        => '2',
            ],
			['id'               => 3 ,
			'name'              => 'じゃがりこ' ,
			'quantity'          => 0 ,
			'total_price'       => 140 ,
			'order_status'      => '発注状態',
            // 'user_id'        => '3',
            ],
			['id'               => 4 ,
			'name'              => 'おっとっと' ,
			'quantity'          => 0 ,
			'total_price'       => 100 ,
			'order_status'      => '発注状態',
            // 'user_id'        => '4',
            ],
			['id'               => 5 ,
			'name'              => 'かっぱえびせん' ,
			'quantity'          => 0 ,
			'total_price'       => 120 ,
			'order_status'      => '発注状態',
            // 'user_id'        => '5',
            ]
        ]);
    }
}

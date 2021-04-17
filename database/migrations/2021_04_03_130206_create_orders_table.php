<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement()->comment('PK');
            $table->integer('quantity');  //発注個数
            $table->integer('total_price');  //発注分の合計金額
            $table->string('order_status');  //発注状態
            // $table->unsignedInteger('stock_id')->nullable(true)->comment('stock_id');
            // $table->unsignedInteger('user_id')->nullable(true)->comment('user_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('登録日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

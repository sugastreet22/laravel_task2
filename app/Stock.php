<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['name', 'price', 'quantity','updated_at', 'created_at'];

    public static function getStocks()     // 在庫の全ての情報をレコードにして返す
    {
        return self::all();     // コントローラでgetStocks()を呼び出して、returnで取得した値をコントローラに返している自分のデータベースを全て参照する

    }

    public static function createStock($create)
    {
        return self::create($create);
    }
}

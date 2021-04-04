<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public static function getStocks()     // 在庫の全ての情報をレコードにして返す
    {
        return self::all();     // コントローラでgetStocks()を呼び出して、returnで取得した値をコントローラに返している
    }
}

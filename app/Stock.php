<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Log;

class Stock extends Model
{
  protected $fillable = ['id','name','quantity','price','created_at'];

  public static function getStocks()
  {
    return self::all();
  }

  public static function registerStocks($create)
  {
      // Log::debug(print_r($create, true)); //モデルに$createが渡されているか
     self::create($create); //保存なのでreturnなくていい
  }

  public static function showStocks($show)
  {
    return self::find($show);
  }

  public static function recordOrders($orderName) //保存された名前
  {
    return self::firstWhere('name', $orderName); //第一引数はカラム 名前を検索しています orderと同じ名前でヒットしたstockのレコードをリターンする
  }

  public static function sumQuantities($update, $id)
  {
    //  Log::debug(print_r($update, true));
    // Log::debug($id); //stockのidが取れる
     self::where('id', $id)->update($update);
  }


}

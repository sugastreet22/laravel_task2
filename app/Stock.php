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
    // Log::debug(print_r($create, true));
    return self::create($create); //保存なのでreturnなくてもいい
  }

  public static function showStocks($show)
  {
    return self::find($show);
  }

  public static function recordOrders($orderName) //保存された名前
  {
    // Log::debug(print_r($orderName, true)); //渡すことが出来た
    return self::firstWhere('name', $orderName); //第一引数はカラム 名前を検索しています
    // Log::debug(print_r($aaa, true)); //firstWhereのデバッグのため
  }

  public static function priceOrders($priceName)
  {
    // Log::debug(print_r($priceName, true));



  }
}

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
    return self::create($create);
  }

  public static function showStocks($show)
  {
    return self::find($show);
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function getOrders()
  {
    return self::all();
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id','name','quantity','total_price','order_status','created_at','updated_at'];

    public static function getOrders()
  {
    return self::all();
  }

  public static function registerOrders($create) //配列がきてる
  {
    return self::create($create); //データベースに保存したものをreturnで返す 7なら7のレコード
  }

  public static function updateOrders($update, $id)
  {
    return self::where('id', $id)->update($update); //第一引数はカラム、第二は登録ボタン押したときに登録されるレコードのid
    // 記述方法：Sample::where('検索値')->update([更新する値]);
  }
}

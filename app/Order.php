<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Log; //デバッグ取りたいときに必要

class Order extends Model
{
    protected $fillable = ['id','name','quantity','total_price','order_status','created_at','updated_at'];

    public static function getOrders()
    {
        return self::paginate(15);
    }

    public static function registerOrders($create) //配列がきてる
    {
    // Log::debug(print_r($create, true)); //配列3つとれていることを確認
        return self::create($create); //データベース（orderのtable）に保存したレコードをreturnで返す 7なら7のレコードを返す
    }

    public static function updateOrders($update, $id)
    {
    // Log::debug(print_r($update, true));
    // Log::debug($id);
        self::where('id', $id)->update($update); //第一引数はカラム、第二は登録ボタン押したときに登録されるレコードのid
    // 記述方法：Sample::where('検索値')->update([更新する値]);
    }

    public static function changeStatus($change, $id)
    {
    // Log::debug(print_r($change, true));
    // Log::debug($id);
        self::where('id', $id)->update($change);
    }
}

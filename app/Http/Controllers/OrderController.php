<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;  //モデルを使う宣言これを書かないと干渉できない
use App\Stock;  //モデルを使う宣言これを書かないと干渉できない
use Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'order' => Order::getOrders()
        ];
        return view('order.index',$data);
    }

    public function changeStatus(Request $request)
    {
         $test = $request->all(); //$requestに値が入っているか
          Log::debug(print_r($test, true));
        $change = [
            'order_status' => $request->order_status,
        ];

        Order::changeStatus($change, $request->id);
        return redirect('order/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'stock' => Stock::getStocks()
        ];
        return view('order.create',$data);
    }

    public function register(Request $request)
    {
        // $test = $request->all(); //発注登録で$requestに値が入っているか
        // Log::debug(print_r($test, true));
        $create = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'order_status' => '発注確認',
        ];

        //  Log::debug(print_r($create, true)); //modelに送る前配列に値が入っているか
        $record = Order::registerOrders($create);  //レコード1列とっている
        $records = Stock::recordOrders($record->name);
        $sum = $records->price * $request->quantity; //stockのpriceが欲しいためstockのnameを出した

        $update = [
            'total_price' => $sum,
        ];

        Order::updateOrders($update, $record->id);  //updateの場合、引数二つ第1が配列、第2は引数（どこの？orderのid）
        // Log::debug(print_r($update, true));
        // Log::debug($sum); 金額（単価）* 発注個数が取れる
        // Stock::priceOrders($records->price);
        // Log::debug($records->id);
        // Log::debug($record->name); //名前がとれることを確認
        // Log::debug($records->price); //値段が撮れました
        return redirect('order/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

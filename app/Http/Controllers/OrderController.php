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
        return view('order.index', $data);
    }

    public function changeStatus(Request $request)
    {
            //  $test = $request->all(); //$requestに値が入っているか
            //  Log::debug(print_r($test, true)); //formで送ったorder_statusとidが取れている。
        $change = [
            'order_status' => $request->order_status,
        ];
            // Log::debug($request->order_status); //発注状況が変更している
        Order::changeStatus($change, $request->id);
        if ($request->order_status === "発注受取済み") {
            $records = Stock::recordOrders($request->name);
            // Log::debug(print_r($records, true));
            //  Log::debug($records->name);
            $sum = $records->quantity + $request->quantity;
            // Log::debug($sum);
            $update = [
                'quantity' => $sum,
            ];
            // Log::debug(print_r($update, true)); //発注受取済みになると$sumが取れる
            //  Log::debug($sum);
            Stock::sumQuantities($update, $records->id); //なにを更新するか どこを検索するかどこのレコードを更新したいか
        }
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
        return view('order.create', $data);
    }

    public function register(Request $request) //商品名個数入力して登録するボタン押すとRequestが走る=>$requestが使える
    {
        // $test = $request->all(); //発注登録を押すと$requestに値が入っているか//
        // Log::debug(print_r($test, true)); //名前と個数が取れる//blade
        // Log::debug($request->name);////$createに値をいれるため nameとれたのでquantityも取れることは確定
        $create = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'order_status' => '発注確認',
        ];

        //  Log::debug(print_r($create, true)); //modelに送る前配列に値が入っているか
        // Log::debug($request->name); ////
        // Log::debug($request->quantity); ////
        $record = Order::registerOrders($create);  //返ってきたレコード1列を$recordに代入する
        // Log::debug(print_r($record, true));//いろいろ出てくる？
        // Log::debug($record->name);
        $records = Stock::recordOrders($record->name); //stockのレコード（orderテーブルと名前が一致したの）を$recordsにいれてる
        // Log::debug(print_r($records, true)); //いろいろ出てくる
        // Log::debug($records->price); stockテーブルの値段priceが取れる
        $sum = $records->price * $request->quantity; //stockのpriceが欲しいためstockのnameを出したこの時点はtpは歯抜け
        // Log::debug($sum);
        $update = [
            'total_price' => $sum,
        ];
        //  Log::debug(print_r($update, true));
        Order::updateOrders($update, $record->id);  //updateの場合、引数二つ第1が配列、第2は引数（どこの？orderのid）アップデートはクリエイト（オートインクリメント）とは違いどこを更新するか指定しないといけないから
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

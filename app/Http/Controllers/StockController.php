<?php

namespace App\Http\Controllers;  //コントローラーがどこの階層にあるか

use Illuminate\Http\Request; //入力された値をとる
use App\Stock;  //モデルを使う宣言これを書かないと干渉できない
use Log;  //デバッグを見れるようにするLOG_CHANNEL=daily1日ごと見れる

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
              'stock'         => Stock::getStocks()   // Stock::（モデルの）getStocks()（モデルで作った関数）を使用
        ];
        // Log::debug(print_r($data, true)); //ターミナルでデバッグを表示
         return view('stock.index', $data);  // stock/indexに、$dataをもたす。すべての在庫情報
        // return view('stock.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create'); //ビューにかえしますget
    }

    public function register(Request $request)
    {
        $data = $request->all();
        Log::debug(print_r($data, true));

        $create = [
            'name'  => $request->name,
			'quantity'     => '0' ,
			'price'     => $request->price,
        ];

        Stock::createStock($create);

        return redirect("/stock/index"); //保存されたらホームに戻す
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

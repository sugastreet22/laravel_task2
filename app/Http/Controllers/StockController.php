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
    public function index() //全部データを取ってくるので引数必要なし
    {
        $data = [
            'stock' => Stock::getStocks()
        ];

        return view('stock.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
    }

    public function register(Request $request) //入力されたデータは$requestは配列が入っている保存するから
    {

        // $test = $request->all(); //ここでうまくとれていないと大体フォームのせい
        // Log::debug(print_r($test, true)); //registerでformでpostしたものが受け取れとれてるか
        $create = [
            'name' => $request->name,
            'quantity' => 0,
            'price' => $request->price,
        ];
        // Log::debug(print_r($create, true)); //modelに送る前のデバッグ
        stock::registerStocks($create);
        // Log::info("デバッグです");
        return redirect('stock/index');
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
    public function show($id) //viewから入ってくる引数
    {
        $data = [
            'stock' => stock::showStocks($id)
        ];

        return view('stock.show', $data);
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

<?php

namespace App\Http\Controllers;  //コントローラーがどこの階層にあるか

use Illuminate\Http\Request; //入力された値をとる
use Symfony\Component\HttpFoundation\StreamedResponse; //csv
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
        return view('stock.create'); //データベースの情報はいらないのでモデルは必要なし//
    }

    public function register(Request $request) //商品名と金額を入力して登録ボタンを押すとrequestが走る。$requestが使えるようになる（配列形式で保存するから）
    {
        //  Log::debug($request->price); //integer//
        // Log::debug($request->name); //string//
        // $test = $request->all(); //ここでうまくとれていないと大体フォームのせい 配列で受け取れていることを確認//
        // Log::debug(print_r($test, true)); //registerでformでpostしたものが受け取れとれてるか//
        $create = [ //データベースに保存するため配列型式にする
            'name' => $request->name,
            'quantity' => 0,
            'price' => $request->price,
        ];
        // Log::debug(print_r($create, true)); //modelに送る前のデバッグ 配列形式で受け取れることを確認//
        // Log::debug($request->name);//string//
        // Log::debug($request->price);//integer//
        stock::registerStocks($create);
        // Log::info("デバッグです");??returnがいらない理由？レコードを使わないから
        return redirect('stock/index');
    }

    public function download(Request $request)
    {
        $stocks = Stock::csvStocks();
        // Log::debug(print_r($stocks, true));
        $cvsList[] = ["id", '名前', '在庫数', '金額（単価）', '登録日時'];
        foreach ($stocks as $stock) {
            // Log::debug($stock["name"]);
            $cvsList[] = [
                // ["id", '名前', '在庫数', '金額（単価）', '登録日時'],
                $stock["id"],
                $stock["name"],
                $stock["quantity"],
                $stock["price"],
                $stock["created_at"]
             ];
        }



        $response = new StreamedResponse(function () use ($request, $cvsList) {
            $stream = fopen('php://output', 'w');

            // 文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach ($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="sample.csv"');

        return $response;
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

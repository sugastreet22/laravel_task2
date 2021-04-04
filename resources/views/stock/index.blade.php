@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">名前</th>
                        <th scope="col">在庫数</th>
                        <th scope="col">金額（単価）</th>
                        <th scope="col">登録日時</th>
                      </tr>
                    </thead>
                    @foreach ($stock as $stocks)
                    <tbody>
                      <tr>
                        <th>{{ $stocks->id }}</th>
                        <td>{{ $stocks->name }}</td>
                        <td>{{ $stocks->quantity }}</td>
                        <td>{{ $stocks->price }}</td>
                        <td>{{ $stocks->created_at }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                    <!-- <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>コアラのマーチ</td>
                        <td>0個</td>
                        <td>130円</td>
                        <td>2021-04-04 12:12:12</td>

                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>ポッキー</td>
                        <td>0個</td>
                        <td>150円</td>
                        <td>2021-04-04 12:12:12</td>

                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>じゃがりこ</td>
                        <td>0個</td>
                        <td>98円</td>
                        <td>2021-04-04 12:12:12</td>

                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>おっとっと</td>
                        <td>0個</td>
                        <td>100円</td>
                        <td>2021-04-04 12:12:12</td>

                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>かっぱえびせん</td>
                        <td>0個</td>
                        <td>120円</td>
                        <td>2021-04-04 12:12:12</td>

                      </tr>
                    </tbody> -->
                  </table>
                    <!-- <a href="{{ route('stock.create') }}">新規登録</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

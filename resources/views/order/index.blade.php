@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="/order/create">発注登録</a>
          <a href="/stock/index">在庫画面へ</a>
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
                          <th scope="col">発注個数</th>
                          <th scope="col">発注金額</th>
                          <th scope="col">発注状況</th>
                          <th scope="col">発注日</th>
                        </tr>
                      </thead>
                          <tbody>
                            @foreach ($order as $orders)
                            <tr>
                              <td>{{ $orders['id'] }}</td>
                              <td>{{ $orders['name'] }}</td>
                              <td>{{ $orders['quantity'] }}</td>
                              <td>{{ $orders['total_price'] }}</td>
                              <td>
                                {{ $orders['order_status'] }}
                                <form method="POST" action="changeStatus" enctype="multipart/form-data">
                                  @csrf
                                  @if($orders['order_status'] === '発注確認')
                                    <input type="hidden" name="order_status" value="発注状態">
                                    <input type="hidden" id="id" name="id" value="{{ $orders['id'] }}">
                                    <button class="btn btn-primary">発注変更</button>
                                  @elseif($orders['order_status'] === '発注状態')
                                    <input type="hidden" name="order_status" value="発注済み">
                                    <input type="hidden" id="id" name="id" value="{{ $orders['id'] }}">
                                    <button class="btn btn-primary">発注変更</button>
                                  @elseif($orders['order_status'] === '発注済み')
                                    <input type="hidden" name="order_status" value="発注受取済み">
                                    <input type="hidden" id="id" name="id" value="{{ $orders['id'] }}">
                                    <button class="btn btn-primary">発注変更</button>
                                  @endif
                                </form>
                              </td>
                              <td>{{ $orders['created_at'] }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

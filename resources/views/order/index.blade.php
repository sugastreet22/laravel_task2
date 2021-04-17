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
                              <td>{{ $orders['order_status'] }}</td>
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

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="/stock/create">在庫登録</a>
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
                        <tbody>
                        @foreach ($stock as $stocks)
                          <tr>
                            <td><a href="/stock/show/{{ $stocks['id'] }}">{{ $stocks['id'] }}</a></td>
                            <td>{{ $stocks['name'] }}</td>
                            <td>{{ $stocks['quantity'] }}</td>
                            <td>{{ $stocks['price'] }}</td>
                            <td>{{ $stocks['created_at'] }}</td>
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

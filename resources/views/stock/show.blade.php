@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="/stock/index">戻る</a>
            <div class="card">
                <div class="card-header">在庫登録</div>

                <div class="card-body">
                  {{ $stock->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="/stock/index">在庫画面へ</a>
            <div class="card">
                <div class="card-header">ようこそ！</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインしました。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

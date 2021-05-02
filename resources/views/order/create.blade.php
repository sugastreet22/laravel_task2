@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/order/index">戻る</a>
            <div class="card">
                <div class="card-header">発注登録</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::User()-> role !== 3)
                        <form class="form" method="POST" action="register">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="name">商品名</label>
                                        <select class="form-control" id="name" name="name" placeholder="商品名" >
                                        @foreach ($stock as $stocks)
                                        <option>{{ $stocks['name'] }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="quantity">個数</label>
                                            <input type="integer" class="form-control" id="quantity" name="quantity" placeholder="個数" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">登録する</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

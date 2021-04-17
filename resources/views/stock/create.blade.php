@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/stock/index">戻る</a>
            <div class="card">
                <div class="card-header">在庫登録</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">商品名</label>
                        <input type="text" class="form-control" id="Stock">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">金額（単価）</label>
                        <input type="text" class="form-control" id="Price">
                    </div>
                    <a href="{{ route('stock.index') }}">登録</a>
                    <button type="submit" class="btn btn-primary btn-block">新規登録</button>
                    </form> -->
                    <form class="form" method="POST" action="register">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name">商品名</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="商品名" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="price">金額</label>
                                        <input type="text" class="form-control" id="name" name="price" placeholder="金額" >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">登録する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

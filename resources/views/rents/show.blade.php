@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description" class="col-md-2 control-label">Cliente</label>
                            <span id="description">{{ $rent->client->name }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="size" class="col-md-2 control-label">Funcionário</label>
                            <div id="size">{{ $rent->user->name }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="price" class="col-md-2 control-label">Total</label>
                            <div id="price">R${{ number_format($rent->total, 2,",",".") }}</div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Descricao</th>
                            <th>Preço</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rent->products as $product)
                            <tr>
                                <td>{{ $product->id  }}</td>
                                <td>{{ $product->description }}</td>
                                <td>R${{ number_format($product->price, 2,",",".") }}</td>
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

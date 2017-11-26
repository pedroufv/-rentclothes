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
                    <div class="row">
                        <div class="col-md-12">
                            <label for="products" class="col-md-2 control-label">Produtos</label>
                            <div id="products" class="col-md-12">
                                @foreach($products as $product)
                                    <label class="checkbox col-md-4">
                                        <input disabled type="checkbox" id="{{ $product->id }}" name="products[]" value="{{ $product->id }}" @if( (is_array(old('products')) AND in_array($product->id, old('products'))) OR in_array($product->id, $rent->products()->pluck('product_id')->toArray())) checked @endif>
                                        {{ $product->description }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

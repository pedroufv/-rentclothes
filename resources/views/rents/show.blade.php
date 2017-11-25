@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description" class="col-md-2 control-label">Descrição</label>
                            <span id="description">{{ $rent->description }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="size" class="col-md-2 control-label">Tamanho</label>
                            <div id="size">{{ $rent->size }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="price" class="col-md-2 control-label">Preço</label>
                            <div id="price">R${{ number_format($rent->price, 2,",",".") }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

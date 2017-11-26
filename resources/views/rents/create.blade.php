@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aluguéis</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('rents.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                            <label for="client_id" class="col-md-4 control-label">Cliente</label>
                            <div class="col-md-6">
                                <select class="form-control" name="client_id">
                                    @foreach($clients as $client)
                                        <option value="{{  $client->id }}" {{ $client->id == old('client_id') ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('start_at') ? ' has-error' : '' }}">
                            <label for="start_at" class="col-md-4 control-label">Início</label>
                            <div class="col-md-6">
                                <input id="start_at" type="text" class="form-control" name="start_at" value="{{ old('start_at') }}" autocomplete="off">
                                @if ($errors->has('start_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
                            <label for="end_at" class="col-md-4 control-label">Fim</label>
                            <div class="col-md-6">
                                <input id="end_at" type="text" class="form-control" name="end_at" value="{{ old('end_at') }}" autocomplete="off">
                                @if ($errors->has('end_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('products') ? 'has-error' : '' }}">
                            <div class="col-md-offset-1">
                                <label for="products">Produtos</label>
                                <p class="text-muted">Selecione produtos do pedido</p>
                                <div id="products" class="col-md-12">
                                    @foreach($products as $product)
                                        <label class="checkbox col-md-5">
                                            <input type="checkbox" id="{{ $product->id }}" name="products[]" value="{{ $product->id }}" @if(is_array(old('products')) && in_array($product->id, old('products'))) checked @endif>
                                            {{ $product->description }}
                                        </label>
                                    @endforeach
                                    @if ($errors->has('products'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('products') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#start_at").datepicker({
                format: 'dd/mm/yyyy',
                language: 'pt-BR'
            }).mask('00/00/0000');

            $("#end_at").datepicker({
                format: 'dd/mm/yyyy',
                language: 'pt-BR'
            }).mask('00/00/0000');
        });
    </script>
@endpush
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('products.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descrição</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label for="size" class="col-md-4 control-label">Tamanho</label>
                            <div class="col-md-6">
                                <input id="size" type="number" class="form-control" name="size" value="{{ old('size') }}" required autofocus>
                                @if ($errors->has('size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Preço</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
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

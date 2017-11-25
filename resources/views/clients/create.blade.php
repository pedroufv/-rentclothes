@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clientes</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('clients.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label for="rg" class="col-md-4 control-label">RG</label>
                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" value="{{ old('rg') }}" required autofocus>
                                @if ($errors->has('rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>
                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required autofocus>
                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
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

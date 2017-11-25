@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="col-md-2 control-label">Nome</label>
                            <span id="name">{{ $client->name }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="rg" class="col-md-2 control-label">Rg</label>
                            <div id="rg">{{ $client->rg }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="cpf" class="col-md-2 control-label">CPF</label>
                          <div id="cpf">{{ $client->cpf }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

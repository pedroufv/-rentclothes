@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#personal-data" aria-controls="personal-data" role="tab" data-toggle="tab">Dados Pessoais</a></li>
                        <li role="presentation"><a href="#address-data" aria-controls="address-data" role="tab" data-toggle="tab">Endereços</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Personal data tab panes -->
                        <div role="tabpanel" class="tab-pane active" id="personal-data">
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('profile.edit') }}">
                                        <button type="button" class="btn btn-default">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">Dados de {{ $user->name }}</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="col-md-6 control-label">Nome</label>
                                            <span id="name">{{ $user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="col-md-6 control-label">E-mail</label>
                                            <span id="name">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Address data tab panes -->
                        <div role="tabpanel" class="tab-pane" id="address-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">Endereços de {{ $user->name }}</div>
                                <div class="panel-body">
                                    @include('address_user.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

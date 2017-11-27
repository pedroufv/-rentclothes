@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Endereço</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('address_client.update', ['client' => $client->id, 'address' => $address->id]) }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        @include('partials.address.edit', ['address' => $address, 'errors'=> $errors])
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

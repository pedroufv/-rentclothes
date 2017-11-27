@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Telefone</div>
                <div class="panel-body">
                    @include('partials.phone.show')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

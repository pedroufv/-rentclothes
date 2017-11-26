@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Aluguéis</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('rents.create') }}" class="btn btn-success">
                                <span class='glyphicon glyphicon-plus'></span>
                            </a>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Cliente</th>
                                    <th>Funcionário</th>
                                    <th>Total</th>
                                    <th>Início</th>
                                    <th>Fim</th>
                                    <th style="width: 85px;">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rents as $rent)
                                    <tr>
                                        <td>{{ $rent->id  }}</td>
                                        <td>{{ $rent->client->name }}</td>
                                        <td>{{ $rent->user->name }}</td>
                                        <td>R${{ number_format($rent->total, 2,",",".") }}</td>
                                        <td>{{ $rent->start_at->format('d/m/Y') }}</td>
                                        <td>{{ $rent->end_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('rents.show',['id' => $rent->id]) }}">
                                                <span class='glyphicon glyphicon-search'></span>
                                            </a> |
                                            <a href="{{  route('rents.edit',['id' => $rent->id]) }}">
                                                <span class='glyphicon glyphicon-pencil'></span>
                                            </a> |
                                            <form onclick="return destroy(this, event)"
                                                  method="POST"
                                                  id='rents-destroy'
                                                  style="display: inline; color: #3097d1;"
                                                  class="form-horizontal"
                                                  role="form"
                                                  action="{{ route('rents.destroy', ['id' => $rent->id]) }}">

                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" style="padding: 0; border: none; background: none;"><span class='glyphicon glyphicon-remove'></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-6 col-md-offset-5">{{ $rents->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function destroy(deleteForm, e) {
            e.preventDefault();
            swal({
                    title: "Tem certeza que deseja excluir?",
                    text: "Não será possível recuperar os dados desta operação!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, excluir!",
                    cancelButtonText: "Não!",
                    closeOnConfirm: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $(deleteForm).submit();
                        return true;
                    }
                });
        }
    </script>
@endpush
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Produtos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('products.create') }}" class="btn btn-success">
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
                                    <th>Descricao</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id  }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>R${{ number_format($product->price, 2,",",".") }}</td>
                                        <td>
                                            <a href="{{  route('products.edit',['id' => $product->id]) }}">
                                                <span class='glyphicon glyphicon-pencil'></span>
                                            </a> |
                                            <form onclick="return destroy(this, event)"
                                                  method="POST"
                                                  id='products-destroy'
                                                  style="display: inline; color: #3097d1;"
                                                  class="form-horizontal"
                                                  role="form"
                                                  action="{{ route('products.destroy', ['id' => $product->id]) }}">

                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" style="padding: 0; border: none; background: none;"><span class='glyphicon glyphicon-remove'></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-6 col-md-offset-5">{{ $products->links() }}</div>
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
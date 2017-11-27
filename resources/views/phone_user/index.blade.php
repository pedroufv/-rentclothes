<div class="row">
    <div class="col-md-12">
        <a href="{{ route('phone_user.create') }}" class="btn btn-success">
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
                <th>Número</th>
                <th style="width: 85px;">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->phones as $phone)
                <tr>
                    <td>{{ $phone->id }}</td>
                    <td>{{ $phone->number }}</td>
                    <td>
                        <a href="{{ route('phone_user.show',['id' => $phone->id]) }}">
                            <span class='glyphicon glyphicon-search'></span>
                        </a> |
                        <a href="{{  route('phone_user.edit',['id' => $phone->id]) }}">
                            <span class='glyphicon glyphicon-pencil'></span>
                        </a> |
                        <form onclick="return destroy(this, event)"
                              method="POST"
                              id='phone_user-destroy'
                              style="display: inline; color: #3097d1;"
                              class="form-horizontal"
                              role="form"
                              action="{{ route('phone_user.destroy', ['id' => $phone->id]) }}">

                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" style="padding: 0; border: none; background: none;"><span class='glyphicon glyphicon-remove'></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

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

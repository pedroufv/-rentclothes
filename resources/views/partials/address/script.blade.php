@push('scripts')
<script>
    $(document).ready(function () {

        $('#zip').keyup(function () {
            var zipCode = $(this).val();
            if (zipCode.length == 9) {
                $.get('https://viacep.com.br/ws/' + zipCode + '/json', function(data) {
                    console.log(data);
                    $('#street').val(data.logradouro);
                    $('#complement').val(data.complemento);
                    $('#district').val(data.bairro);
                    $('#city').val(data.localidade);
                    $('#state').val(data.uf);
                });
            }
        }).mask('00000-000');

        $('#number').mask('0#');

        $('#state').mask('SS');
    });
</script>
@endpush
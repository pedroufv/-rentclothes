<div class="row">
    <div class="col-md-12">
        <label for="street" class="col-md-12 control-label">{{ $address->street }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="number" class="col-md-6 control-label">Numero</label>
        <span id="address[number]">{{ $address->number }}</span>
    </div>
    <div class="col-md-4">
        <label for="zip" class="col-md-6 control-label">CEP</label>
        <span id="address[zip]">{{ $address->zip }}</span>
    </div>
    <div class="col-md-4">
        <label for="complement" class="col-md-6 control-label">Complemento</label>
        <span id="address[complement]">{{ $address->complement ? $address->complement : 'n/a' }}</span>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="district" class="col-md-6 control-label">Bairro</label>
        <span id="address[district]">{{ $address->district }}</span>
    </div>
    <div class="col-md-4">
        <label for="city" class="col-md-6 control-label">Cidade</label>
        <span id="address[city]">{{ $address->city }}</span>
    </div>
    <div class="col-md-4">
        <label for="state" class="col-md-6 control-label">Estado</label>
        <span id="address[state]">{{ $address->state }}</span>
    </div>
</div>
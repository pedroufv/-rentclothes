<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
    <label for="zip" class="col-md-4 control-label">CEP</label>
    <div class="col-md-6">
        <input id="zip" type="text" class="form-control" name="zip" value="{{ old('address.zip') }}" required autofocus autocomplete="off">
        @if ($errors->has('zip'))
            <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
    <label for="street" class="col-md-4 control-label">Rua</label>
    <div class="col-md-6">
        <input id="street" type="text" class="form-control" name="street" value="{{ old('address.street') }}" required autofocus autocomplete="off">
        @if ($errors->has('street'))
            <span class="help-block">
                <strong>{{ $errors->first('street') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
    <label for="number" class="col-md-4 control-label">Número</label>
    <div class="col-md-6">
        <input id="number" type="text" class="form-control" name="number" value="{{ old('address.number') }}" required autofocus autocomplete="off">
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('complement') ? ' has-error' : '' }}">
    <label for="complement" class="col-md-4 control-label">Complemento</label>
    <div class="col-md-6">
        <input id="complement" type="text" class="form-control" name="complement" value="{{ old('address.complement') }}" autofocus autocomplete="off">
        @if ($errors->has('complement'))
            <span class="help-block">
                <strong>{{ $errors->first('complement') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
    <label for="district" class="col-md-4 control-label">Bairro</label>
    <div class="col-md-6">
        <input id="district" type="text" class="form-control" name="district" value="{{ old('address.district') }}" required autofocus autocomplete="off">
        @if ($errors->has('district'))
            <span class="help-block">
                <strong>{{ $errors->first('district') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label for="city" class="col-md-4 control-label">Cidade</label>
    <div class="col-md-6">
        <input id="city" type="text" class="form-control" name="city" value="{{ old('address.city') }}" required autofocus autocomplete="off">
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <label for="state" class="col-md-4 control-label">Estado</label>
    <div class="col-md-6">
        <input id="state" type="text" class="form-control" name="state" value="{{ old('address.state') }}" required autofocus autocomplete="off">
        @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>
</div>
@include('partials.address.script')
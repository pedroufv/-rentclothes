<div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
    <label for="number" class="col-md-4 control-label">Número</label>
    <div class="col-md-6">
        <input id="number" type="text" class="form-control" name="number" value="{{ old('phone.number') }}" required autofocus autocomplete="off">
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif
    </div>
</div>
@include('partials.phone.script')

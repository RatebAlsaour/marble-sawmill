<div class="form-group">
    <label for="{{$id}}">{{ $label  }}</label>
    <textarea id="{{$id}}" name="{{$name}}"
              class="form-control @error('$name') is-invalid @enderror" maxlength="500"
              rows="8"
              placeholder="{{isset($placeholder) ? $placeholder : __('common.' . $name)}}">{{isset($attributes['entity']) && isset($attributes['entity'][$name]) ? $attributes['entity'][$name] : old($name)}}</textarea>

    @error($name)
    <span class="invalid-feedback block d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
{{-- @if ($models->count()>0) --}}

{{-- <div class="col-lg-4 "> --}}
    <div class="form-group mt15">
        <fieldset>
            <legend class="mbm12">Model</legend>
            <select class="form-control b0 " name="feature-data-model">
            
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->model_name }}</option>
                    @endforeach
            </select>
        </fieldset>
    </div>
{{-- </div> --}}
{{-- @endif --}}


<div class="col-lg-6">
    <div class="form-group">
        <select class="form-control " name="feature_data_model_id">
            <option value="">Model</option>
            @foreach ($models as $model)
            <option value="{{ $model->id }}">{{ $model->model_name }}</option>
            @endforeach
        </select>  
    </div>
</div>
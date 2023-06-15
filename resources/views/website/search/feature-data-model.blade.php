<div class="title mb20 hide-feature-data{{ $feature_data_id }}">
    <h6>Model <span class="floatr clear-feature" data-id="{{ $feature_data_id }}"> <i class="fa fa-minus "></i></span>
            <span><a href="#!" class="floatr"> Clear </a></span>
    </h6>
</div>
<div class="form-group">
    <select class="form-control " name="feature_data_model_id">
        <option value="">Model</option>
        @foreach ($models as $model)
        <option value="{{ $model->id }}">{{ $model->model_name }}</option>
        @endforeach
    </select>  
</div>
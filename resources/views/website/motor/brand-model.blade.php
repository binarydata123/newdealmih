

@if(isset($featureBrand))

<div class="col-lg-3 " >
    <div class="form-group mt15">
        <fieldset>
            <legend class="mbm12">{{ucwords($featureBrand->name)}}</legend>
            <select class="form-control b0 feature-data-value "  name="feature-data">
                @if ($featureBrand->featureData)
                <option value="">Select</option>
                    @foreach ($featureBrand->featureData as $featureDataBrand)
                        <option value="{{$featureDataBrand->id}}">{{$featureDataBrand->data_name}}</option>
                    @endforeach
                @endif
            </select>
        </fieldset>
    </div>
    </div>
    @endif
    {{-- model loop  --}}
    @if($subCategory->slug == 'cars' || $subCategory->slug == 'motorcycles' || $subCategory->slug == 'scooters' || $subCategory->slug == 'commercial-other-vehicles')
    <div class="col-lg-3 feature-data-model-result">
        <div class="form-group mt15 ">
            <fieldset>
                <legend class="mbm12">Model</legend>
                <select class="form-control b0">
                    <option value="">Select</option>
                </select>
            </fieldset>
        </div>
    </div>
    @endif

    {{-- feature loop  --}}

    @if ($features)
    @foreach ($features as $key => $feature)
    <div class="col-lg-3 " >
    <div class="form-group mt15">
            <fieldset>
            <legend class="mbm12">{{ucwords($feature->name)}}</legend>
            <select class="form-control b0 @if(ucwords($feature->name) == "Brand") feature-data-value @endif" name="feature-data">
                @if ($feature->featureData)
                <option value="">Select</option>
                    @foreach ($feature->featureData as $featureData)
                        <option value="{{$featureData->id}}">{{$featureData->data_name}}</option>
                    @endforeach
                @endif
            </select>
        </fieldset>
    </div>
    </div>
    @endforeach
 
@endif
    
  
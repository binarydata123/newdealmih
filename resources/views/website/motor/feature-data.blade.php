





{{-- type  --}}
<!-- <div class="col-lg-3">
    <div class="form-group mt15">
        <fieldset class="p6 fpox">
            <legend class="mbm12 lbox">Type</legend>
            <input type="radio" id="age1" name="age" value="30" checked="">
                                             <label for="age1" class="fs12">Used </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <input type="radio" id="age2" name="age" value="60">
                                             <label for="age2" class="fs12"> Brand New</label> 
           
        </fieldset>
    </div>
</div> -->

 <!-- <select class="form-control b0">
                <option value="">Select Type</option>
                <option value="1">Used</option>
                <option value="2">Brand New</option>
            </select> -->

{{-- brand featur loop  --}}
{{-- @if(isset($featureBrand))

<div class="col-lg-3 " >
    <div class="form-group mt15">
        <fieldset>
            <legend class="mbm12">{{ucwords($featureBrand->name)}} </legend>
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
    @endif --}}
    {{-- model loop  --}}
    {{-- @if($subCategoryId == 50 || $subCategoryId == 51 || $subCategoryId == 52)
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
    @endif --}}
    {{-- feature loop without brand  --}}
    @if ($features)
        @foreach ($features as $key => $feature)
        <div class="col-lg-3 collapse" id="vmore" >
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

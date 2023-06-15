@if ($features)
    @foreach ($features as $feature)

        <div class="title mb20 hide-feature-data{{ $categoryId }}">
            @if($feature->id != 65 && $feature->id != 90 && $feature->id != 89 && $feature->id != 63 && $feature->id != 64)
                <h6>{{ $feature->name }} <span class="floatr clear-feature" data-id="{{ $categoryId }}"> <i
                            class="fa fa-minus "></i></span>
                    <span><a href="#!" class="floatr"> Clear </a></span>
                </h6>
            @endif
        </div>

        <div class=" hide-feature-data{{ $categoryId }} feature-data{{ $categoryId }}">
            <div class="form-group">
                @if ($feature->featureData)
                        {{-- text input  --}}
                        @if ($feature->input_type == 1)
                        @foreach ($feature->featureData as $dataValue)
                            <input type="text" name="" id="" 
                            data-id="{{$feature->id}}" class="form-control feature-data-value 
                            feature-data-value{{$feature->id}}" 
                            value="{{$dataValue->data_name}}">
                            @endforeach
                        @endif
                        {{-- select input  --}}
                        @if ($feature->input_type == 2)
                            @if($feature->id != 65 && $feature->id != 89 && $feature->id != 63 && $feature->id != 64)
                                <select data-id="{{$feature->id}}" 
                                    class="form-control customfil @if($feature->slug == 'brand') brands @endif filters feature-data-value feature-data-value{{$feature->id}}">
                                    <option value="">Select {{$feature->name}}</option>
                                    @foreach ($feature->featureData as $dataValue)
                                    <option value="{{$dataValue->id}}">{{$dataValue->data_name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if($feature->id == 53)

                             <div class="row ml0">
                                    <div class="col-lg-5 pl0">
                                        <div class="form-group">
                                            <p class="ffs14">Land Area</p>
                                            <!-- <select class="form-control h52" name="land_area_start">
                                                <option value="">Minimum</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select> -->
                                             <input type="text" class="form-control h52" placeholder="Enter Area" name="land_area_unit_number" id="keyword_search" class="keyword_search">
                                        </div>
                                    </div>

                                    <div class="col-lg-7 pl0">
                                        <div class="form-group">
                                            <p class="fo12">&nbsp;</p>
                                          <!--  <select class="form-control h52" name="land_area_end">
                                            <option value="">    Type</option>
                                            <option value="1">Aana</option>
                                            <option value="2">Dhur</option>
                                            <option value="3">Kattha</option>
                                            <option value="4">Bigha</option>
                                            <option value="5">Ropani</option>
                                            <option value="6">Paisa</option>
                                            <option value="7">Dam</option>


                                        </select> -->
                                        <select class="form-control h52" name="land_area">
                                                    <option value="">Select Land Area</option>
                                                    <option value="aana">Aana</option>
                                                    <option value="dhur">Dhur</option>
                                                    <option value="kattha">Kattha</option>
                                                    <option value="bigha">Bigha</option>
                                                    <option value="ropani">Ropani</option>
                                                    <option value="paisa">Paisa</option>
                                                    <option value="dam">Dam</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                    

                            @endif

                        @endif
                        @if ($feature->featureDataModel)

                        @if ($feature->input_type == 1)
                        @foreach ($feature->featureDataModel as $dataValue)
                        
                            <input type="text" name="" id="" 
                            data-id="{{$feature->id}}" class="form-control feature-data-value 
                            feature-data-value{{$feature->id}}" 
                            value="{{$dataValue->data_name}}">
                            @endforeach
                        @endif
                        @endif
                        {{-- select checkbox  --}}
                        @if ($feature->input_type == 3)
                        @foreach ($feature->featureData as $dataValue)
                        <br><input type="checkbox" data-id="{{$dataValue->id}}"
                         class="feature-data-value-checkbox filter feature-data-value-checkbox{{$dataValue->id}}" >
                        <label for="age1" class="fs14o"> {{$dataValue->data_name}}</label>
                        @endforeach
                        @endif

                        
                       
                   
                @endif
               
            </div>
        </div>

    @endforeach
@endif

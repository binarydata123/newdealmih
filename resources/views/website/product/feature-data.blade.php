<br>
    @if ($features)
        @foreach ($features as $feature)
            @if ($feature->featureData)

                @if ($feature->input_type == 4)
                    @foreach ($feature->featureData as $dataValue)
                        <div class="mtb30">
                            <p class="mb20">{{ $feature->ame }}</p>
                            <input type="radio" id="age1" name="radio_type[{{$dataValue->id}}]" value="{{$dataValue->id}}" checked="">
                            <label for="age1"><b> {{$dataValue->data_name}}</b></label>
                            {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="age2" name="age" value="60">
                            <label for="age2"> <b>used item</b></label> --}}
                        </div>
                    @endforeach
                @endif

              
                    @if ($feature->input_type == 1)
                        @foreach ($feature->featureData as $dataValue)
                            {{-- input type --}}
                            <div class="col-lg-6">
                                <div class="form-group"><input type="text" name="input_type[{{$dataValue->id}}]" class="form-control"
                                        placeholder="{{$feature->name}}">
                                </div>
                            </div>
                        @endforeach
                    @endif
                    {{-- select box --}}
                    @if ($feature->input_type == 2)
                        @if($feature->name != 'Couples OK')
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select onchange="getval(this);" class="form-control @if($feature->slug == 'brand') brands @endif" name="select_type[{{$feature->id}}]">
                                        <option value="">{{$feature->name}}</option>
                                        @if($product_data)
                                            @foreach ($feature->featureData as $dataValue)
                                            <option value="{{$dataValue->id}}" @if ($dataValue->id == $product_data->feature_data_id) selected @endif>{{$dataValue->data_name}}</option>
                                            @endforeach
                                        @else
                                            @foreach ($feature->featureData as $dataValue)
                                            <option value="{{$dataValue->id}}">{{$dataValue->data_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                       
                                </div>
                            </div>
                        @endif
                    @endif
                @if ($feature->input_type == 3)
                @foreach ($feature->featureData as $dataValue)
                <div class="row ml0">
                    {{-- checkbox --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="checkbox" name="checkbox_type[{{$dataValue->id}}]">
                            <label for="age1" class="fs14o"> {{$dataValue->data_name}}</label>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            @endif
        @endforeach
    @endif

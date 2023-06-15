@if($products)
@php
    $product_property_features_data = DB::table('product_property_features')->where('product_id', $products->id)->first();
@endphp

@if ($product->category_id != 326)
<div class="row ml0">

    <div class="col-lg-12">
       <label>Google Map Location</label> 
    </div>
    <div class="col-lg-6 font-0-6">
        <div class="form-group">
           
            <input type="text" name="location" id="address-input" class="form-control map-input address-input location" placeholder="Google Map Location" autocomplete="off" style="width:100%;" value="{{$product_property_features_data->location}}">
            <span class="error" style="color:red;"></span>
            <input type="hidden" name="address_latitude" id="address-latitude" value="{{$product_property_features_data->latitude}}" />
            <input type="hidden" name="address_longitude" id="address-longitude" value="{{$product_property_features_data->longitude}}" />
        </div>
    </div>
    {{-- <div class="col-lg-6 font-0-6 hide-without-land">
        <div class="form-group">
           <select class="form-control property_type" name="property_type">
               <option value="">Type</option>
               <option value="1">Appartments</option>
               <option value="2">Builder Floor</option>
               <option value="3">Farm House</option> 
               <option value="4">Houses & Villas</option>
               <option value="5">Hostel</option>
               <option value="6">PG & Guest house</option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div> --}}
    

    <div class="col-lg-3 font-0-6 land-area-hide " id="land-area1" style="display: none">
        <div class="land_area_number">   
            <div class="form-group">
                <input type="text" name="land_area_unit_number" class="form-control land_area_unit_number" placeholder="Enter Land Area" value="{{$product_property_features_data->land_area_unit_number}}">
                <span class="error" style="color: red;"></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 font-0-6 land-area-hide " id="land-area2" style="display: none">
        <div class="form-group">
            <select class="form-control land-area" name="land_area">
                <option value="">Select Land Area Type</option>
                <option value="aana" @if($product_property_features_data->land_area== 'aana') selected @endif>Aana</option>
                <option value="dhur" @if($product_property_features_data->land_area== 'dhur') selected @endif>Dhur</option>
                <option value="kattha" @if($product_property_features_data->land_area== 'kattha') selected @endif>Kattha</option>
                <option value="bigha" @if($product_property_features_data->land_area== 'bigha') selected @endif>Bigha</option>
                <option value="ropani" @if($product_property_features_data->land_area== 'ropani') selected @endif>Ropani</option>
                <option value="paisa" @if($product_property_features_data->land_area== 'paisa') selected @endif>Paisa</option>
                <option value="dam" @if($product_property_features_data->land_area== 'dam') selected @endif>Dam</option>
            </select>
            <span class="error" style="color:red;"></span>
        </div>
    </div>
    <!-- <div class="col-lg-6 land_area">      
        <div class="form-group"><input type="text" name="land_area"
                class="form-control land_area" placeholder="Land Area Square Meter [m2]">
            <span class="error" style="color: red;"></span>

        </div>
        <p>1 Aana [aana] = 31.8 sq m</p>
        <p>1 Katha = 126.44 sq m</p>
        <p>1 Dhur = 0.334 sq m</p>
    </div> -->
    <div class="col-lg-6 business_type" style="display: none;">
        <div class="form-group">
           <select class="form-control property_type" name="property_type">
               <option value="">Business Type</option>
               <option value="1">Internet & technology</option>
               <option value="2"> Manufacturing </option>
               <option value="3"> Retail </option> 
               <option value="4"> Services </option>
               <option value="5"> Tourism & hospitality </option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group" ><input type="text" id="bathroom" name="bathrooms" class="form-control bathrooms" placeholder="Bathrooms (optional)" value="{{$product_property_features_data->bathrooms}}">
            <span class="error" style="color: red;"></span>
        </div>
    </div>  
    <div class="col-lg-6 hide-without-land bedrooms_land">
        <div class="form-group" ><input type="text" name="bedrooms" class="form-control bedrooms" placeholder="Bedrooms (optional)" value="{{$product_property_features_data->bedrooms}}">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land" id="listed_by2">
        <div class="form-group" >
            <select class="form-control listed_by" name="listed_by">
                <option value="">Listed By</option>
                <option value="1" @if ($product_property_features_data->listed_by == '1') selected @endif>Owner</option>
                <option value="2" @if ($product_property_features_data->listed_by == '2') selected @endif>Agent</option>
                <option value="3" @if ($product_property_features_data->listed_by == '3') selected @endif>Individual</option>
                {{-- <option value="2">Part Time</option>
                <option value="3">Work From Home </option> --}}
            </select>
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group">
            <select class="form-control furnished" name="furnished">
                <option value="">Furnished</option>
                <option value="1" @if ($product_property_features_data->furnished == '1') selected @endif>Yes</option>
                <option value="2" @if ($product_property_features_data->furnished == '2') selected @endif>No</option>
                {{-- <option value="2">Part Time</option>
                <option value="3">Work From Home </option> --}}
            </select>   
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group" ><input type="text" name="floor_no" id="floor" class="form-control floor_no" placeholder="Floor No (optional)" value="{{$product_property_features_data->floor_no}}">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group"><input type="text" name="facilities" class="form-control facilities" placeholder="Facilities (optional)" maxlength="500" value="{{$product_property_features_data->facilities}}">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
   <!--  <div class="col-lg-6 hide-without-land">
        <div class="form-group"><input type="text" name="car_parking"
                class="form-control car_parking" placeholder="No.of parking (optional)">
            <span class="error" style="color: red;"></span>

        </div>
    </div> -->
    <div class="col-lg-6 hide-without-land">
        <div class="form-group">
           <select class="form-control facing" name="facing">
               <option value="">Facing</option>
               <option value="1" @if ($product_property_features_data->facing == '1') selected @endif>North</option>
               <option value="2" @if ($product_property_features_data->facing == '2') selected @endif>East</option>
               <option value="3" @if ($product_property_features_data->facing == '3') selected @endif>West</option>
               <option value="4" @if ($product_property_features_data->facing == '4') selected @endif>South</option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group"><input type="text" name="car_parking"
                class="form-control car_parking" placeholder="No.of parking (optional)" value="{{$product_property_features_data->car_parking}}">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
    <div class="col-lg-6 hide-without-land onrent" id="project_name1">
        <div class="form-group"><input type="text" name="project_name"
                class="form-control project_name" placeholder="Project Name (optional)" value="{{$product_property_features_data->project_name}}">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
    <div class="col-lg-6 hide-without-land onrent">
        <div class="form-group"><input type="text" name="youtube_url"
                class="form-control youtube_url" placeholder="Youtube video URL (optional)" maxlength="500" value="{{$product_property_features_data->youtube_url}}">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group"> 
            <input type="text" name="available_date" id="available_date" class="form-control available_date"  placeholder="Available Date" value="{{$product_property_features_data->available_date}}">
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group">
            <input type="text" name="carpet_area" class="form-control carpet_area" placeholder="Carpet Area (optional)" value="{{$product_property_features_data->carpet_area}}">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    {{-- <div class="col-lg-6 hide-without-land">
        <div class="form-group">
           <select class="form-control property_use" name="property_use">
               <option value="">Property Use</option>
               <option value="1">Development Site</option>
               <option value="2">Hotel/Leisure</option>
               <option value="3">Industrial</option>
               <option value="3">Office</option>
               <option value="4">Retail</option>
               <option value="">Tourism</option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div> --}}
    <div class="col-lg-6 existing_flatemate " style="display: none;">
        <div class="form-group"><input type="text" name="existing_flatemate" class="form-control existing_flatemate" placeholder="Existing Flatemate (optional)">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
</div>
@else
<div class="row ml0">

    <div class="col-lg-12">
       <label>Google Map Location</label> 
    </div>
    <div class="col-lg-6 font-0-6">
        <div class="form-group">
           
            <input type="text" name="location" id="address-input" class="form-control map-input address-input location" placeholder="Google Map Location" autocomplete="off" style="width:100%;" value="{{$product_property_features_data->location}}">
            <span class="error" style="color:red;"></span>
            <input type="hidden" name="address_latitude" id="address-latitude" value="{{$product_property_features_data->latitude}}" />
            <input type="hidden" name="address_longitude" id="address-longitude" value="{{$product_property_features_data->longitude}}" />
        </div>
    </div>
    
</div>
@endif
@else 
<div class="row ml0">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Google Map Location</label> 
            <input type="text" name="location" id="address-input" class="form-control map-input address-input location" placeholder="Google Map Location" autocomplete="off" style="width:100%;">
            <span class="error" style="color:red;"></span>
            <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
            <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
        </div>
    </div>
    {{-- <div class="col-lg-6 hide-without-land">
        <div class="form-group">
           <select class="form-control property_type" name="property_type">
               <option value="">Type</option>
               <option value="1">Appartments</option>
               <option value="2">Builder Floor</option>
               <option value="3">Farm House</option> 
               <option value="4">Houses & Villas</option>
               <option value="5">Hostel</option>
               <option value="6">PG & Guest house</option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div> --}}
    <div class="col-lg-2 land-area-hide pr-0 " id="land-1" style="display: none">
        <div class="land_area_number">   
            <div class="form-group">
                <input type="text" name="land_area_unit_number" class="form-control land_area_unit_number" placeholder="Enter Land Area" value="">
                <span class="error" style="color: red;"></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 land-area-hide " id="land-2" style="display: none;margin-top: 26px;">
        <div class="form-group">
            <select class="form-control land-area" name="land_area">
                <option value="">Select Land Area Type</option>
                <option value="aana">Aana</option>
                <option value="dhur">Dhur</option>
                <option value="kattha">Kattha</option>
                <option value="bigha">Bigha</option>
                <option value="ropani">Ropani</option>
                <option value="paisa">Paisa</option>
                <option value="dam">Dam</option>
            </select>
            <span class="error" style="color:red;"></span>
        </div>
    </div>
    
    <!-- <div class="col-lg-6 land_area">      
        <div class="form-group"><input type="text" name="land_area"
                class="form-control land_area" placeholder="Land Area Square Meter [m2]">
            <span class="error" style="color: red;"></span>

        </div>
        <p>1 Aana [aana] = 31.8 sq m</p>
        <p>1 Katha = 126.44 sq m</p>
        <p>1 Dhur = 0.334 sq m</p>
    </div> -->
    <div class="col-lg-6 business_type" style="display: none;">
        <div class="form-group">
           <select class="form-control property_type" name="property_type">
               <option value="">Business Type</option>
               <option value="1">Internet & technology</option>
               <option value="2"> Manufacturing </option>
               <option value="3"> Retail </option> 
               <option value="4"> Services </option>
               <option value="5"> Tourism & hospitality </option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div>

    <div class="col-lg-6 hide-without-land">
        <div class="form-group" ><input type="text" name="bathrooms" id="bath" class="form-control bathrooms" placeholder="Bathrooms (optional)">
            <span class="error" style="color: red;"></span>
        </div>
    </div>  
    <div class="col-lg-6 hide-without-land bedrooms_land">
        <div class="form-group" ><input type="text" name="bedrooms" class="form-control bedrooms" placeholder="Bedrooms (optional)">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land" id="listed_by2">
        <div class="form-group" >
            <select class="form-control listed_by" name="listed_by">
                <option value="">Listed By</option>
                <option value="1">Owner</option>
                <option value="2">Agent</option>
                <option value="3" class="listed_by_individual_option">Individual</option>
<!--                 <option value="3">Individual</option>
 -->                {{-- <option value="2">Part Time</option>
                <option value="3">Work From Home </option> --}}
            </select>
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group" >
            <select class="form-control furnished" name="furnished">
                <option value="">Furnished</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
                {{-- <option value="2">Part Time</option>
                <option value="3">Work From Home </option> --}}
            </select>   
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group"><input type="text" name="floor_no" class="form-control floor_no" placeholder="Floor No (optional)">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    <div class="col-lg-6 hide-without-land" id="facilities_land">
        <div class="form-group"><input type="text" name="facilities" class="form-control facilities" placeholder="Facilities (optional)" maxlength="500">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
   <!--  <div class="col-lg-6 hide-without-land">
        <div class="form-group"><input type="text" name="car_parking"
                class="form-control car_parking" placeholder="No.of parking (optional)">
            <span class="error" style="color: red;"></span>

        </div>
    </div> -->
    <div class="col-lg-6 hide-without-land" id="facing_land">
        <div class="form-group">
           <select class="form-control facing" name="facing">
               <option value="">Facing</option>
               <option value="1">North</option>
               <option value="2">East</option>
               <option value="3">West</option>
               <option value="4">South</option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group"><input type="text" name="car_parking"
                class="form-control car_parking" placeholder="No.of parking (optional)">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
    <div class="col-lg-6 hide-without-land onrent" id="project_name1">
        <div class="form-group"><input type="text" name="project_name"
                class="form-control project_name" placeholder="Project Name (optional)">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
    <div class="col-lg-6 hide-without-land onrent">
        <div class="form-group"><input type="text" name="youtube_url"
                class="form-control youtube_url" placeholder="Youtube video URL (optional)" maxlength="500">
            <span class="error" style="color: red;"></span>

        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group"> 
            <input type="text" name="available_date" id="available_date" class="form-control available_date"  placeholder="Available Date">
        </div>
    </div>
    <div class="col-lg-6 hide-without-land">
        <div class="form-group">
            <input type="text" name="carpet_area" class="form-control carpet_area" placeholder="Carpet Area (optional)">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
    {{-- <div class="col-lg-6 hide-without-land">
        <div class="form-group">
           <select class="form-control property_use" name="property_use">
               <option value="">Property Use</option>
               <option value="1">Development Site</option>
               <option value="2">Hotel/Leisure</option>
               <option value="3">Industrial</option>
               <option value="3">Office</option>
               <option value="4">Retail</option>
               <option value="">Tourism</option>
           </select>
           <span class="error" style="color: red;"></span>
       </div>
    </div> --}}
    <div class="col-lg-6 existing_flatemate " style="display: none;">
        <div class="form-group"><input type="text" name="existing_flatemate" class="form-control existing_flatemate" placeholder="Existing Flatemate (optional)">
            <span class="error" style="color: red;"></span>
        </div>
    </div>
</div>
@endif
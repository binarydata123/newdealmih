<style>
    .bs {
    box-shadow: unset !important;
}
</style>
        @if ($products->count() >0)
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                <div class="product-card">
                   
                        <div class="product-media resimg">
                            <div class="product-type wl">
                                <div class="product-btn">
                                    <button type="button" title="Wishlist"
                                        class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>

                        <div class="product-content">
                            <div class="breadcrumb product-category h165">
                                <div class="ml20">
                                    <p class="breadcrumb-item"><a
                                            href="{{ url('jobs-detail/' . $product->slug) }}"
                                            class="fs18l3">{{ ucwords($product->title) }}</a></p>
                                    <p class="ml15">
                                    <p class="fs14o">{{ str_limit(strip_tags($product->description, 50)) }}</p>
                                    </p>
                                    <p style="height:50px;overflow:hidden;">
                                        <a href="{{ url('jobs-detail/' . $product->slug) }}">
                                            
                                            <img @if (isset($product->seller_image))
                                            src="{{ url('public/media/seller-image/' . $product->seller_image) }}"
                                        @else src="{{ url('public/website/images/favicon.png') }}"
                @endif
                class="mb20" width="48">
                </a></p>
        </div>
    </div>
    <div class="product-info">
        <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
            {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
        </span>
        <div>
        <span>
                Listed Date: {{ $product->created_at->format('D d M') }}
            </span></div>
    </div>
</div>
                       
                    {{-- <div class="product-content">
                       
                        <ol class="breadcrumb product-category">

                            <li class="breadcrumb-item"><a  href="{{url('jobs-detail/'.$product->slug)}}"
                                    class="fs18l3 ml15">{{ ucwords($product->title) }}</a></li>
                            <li>
                                <p class="fs14o ml15">{!! str_limit($product->description,50) !!}</p>
                            </li>
                            <li>
                                <a href="{{url('jobs-detail/'.$product->slug)}}">
                                <img @if(isset($product->seller_image)) 
                                src="{{ url('public/media/seller-image/'.$product->seller_image) }}"
                                @else src="{{ url('public/website/images/favicon.png') }}" @endif
                                    class="ml15 mb20" width="48">
                                </a></li>
                        </ol>
                        <div class="product-info">
                            <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif --}}
                                {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                            {{-- </span>
                            <div> <span>
                                    Closes: {{ $product->created_at->addDays(30)->format('D d M') }}
                                </span></div>
                        </div>
                    </div> --}}

                    
                

                </div>
            </div>
            @endforeach
            @else
            @include('website.no-data')
        @endif
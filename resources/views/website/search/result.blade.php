<style>
    .bs {
    box-shadow: unset !important;
}
</style>
{{-- 
    <div class="row mb20">
        <div class="col-lg-9">
            <div class="header-filter">
                <h3>MarketPlace</h3>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="filter-short">
                <!-- <label class="filter-label">Sort by :</label> -->
                <select class="custom-select filter-select">
                    <option selected>New & Used</option>
                    <option value="3">trending</option>
                    <option value="1">featured</option>
                    <option value="2">recommend</option>
                </select>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row"> --}}
        @if ($products->count() > 0)
            @foreach ($products as $product)
            @php
                $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();
            @endphp

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                    <div class="product-card">
                        <div class="product-media resimg">
                            @if($header_category_data->id != '5')
                            <a href="{{ url('product/detail/' . $product->slug) }}" target="_blank">
                                <div class="product-img">
                                    @if ($product->image)
                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                            alt="product">
                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                            alt="product">
                                    @endif
                                </div>
                                </a>
                                @else
                                <a href="{{ url('services-detail/' . $product->slug) }}" target="_blank">
                                <div class="product-img">
                                    @if ($product->image)
                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                            alt="product">
                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                            alt="product">
                                    @endif
                                </div>
                                </a>
                                @endif
                                

                                <div class="product-type">
                                        <div class="product-btn">
                                            @if (Auth::check())
                                                <button type="button" title="Wishlist"
                                                    data-id="{{ $product->id }}"
                                                    class="@if ($product->wishlist) @if ($product->wishlist->user_id == Auth::user()->id) 
                                        fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif" id="wishlist_{{$product->id}}"></button>
                                            @endif
                                        </div>
                                </div>
                            
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li>
                                    <p class="product-price tblak"> रू</p>
                                </li>
                                <li class="breadcrumb-item">
                                    @if($header_category_data->id != '5')
                                         <a href="{{ url('product/detail/' . $product->slug) }}" target="_blank">
                                        @if(is_numeric($product->price)) {{ number_format($product->price) }} @endif</a>
                                        @else
                                        <a href="{{ url('services-detail/' . $product->slug) }}" target="_blank">
                                        @if(is_numeric($product->price)) {{ number_format($product->price) }} @endif</a>
                                        @endif
                                    </li>
                            </ol>
                            <div class="product-meta"><span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}">{{ ucwords(Str::limit($product->title,35)) }}</span><br>
                                @if($product->type == 1)
                                <span class="s-used">Used</span>
                                @else
                                <span class="s-success">Brand New</span>
                                @endif
                            </div>
                            <div class="product-info">
                                <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
                                </span>
                                <div> <span>
                                        Closes: {{ $product->created_at->addDays(30)->format('D d M') }}
                                    </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            @include('website.no-data')
        @endif
    {{-- </div> --}}

      <script>
        $('.wishlist').on('click', function () {
        var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: base_url + "wishlist",
                data: {
                    id: id
                },
                success: function(res) {

                    console.log(res[1]);

                    if(res[1] == 'Wishlist'){
                        $('#wishlist_'+id).removeClass("fas");
                    }else {
                        $('#wishlist_'+id).addClass("fas");
                    }

                    $('.alert-msg').html(res[0]);
                   $('.alert-msg').addClass("alert-success");

                },
                error: function() {

                }
            })
        })
    </script>
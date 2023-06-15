@extends('website.layout.app')
@section('css')
@endsection
@section('content')

    <section class="inner-section ad-list-part mt40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb20 fs14">Home/MarketPlace/ <a href="#!">List View </a></p>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row">

                        <div class="col-md-6 col-lg-12">
                            <div class="product-widget">
                                <h4 class="product-widget-title fils">Filters</h4>
                                <form class="product-widget-form formpad">
                                    <h6>Categories</h6>
                                    <ul class="product-widget-list product-widget-scroll">
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <li class="product-widget-item">
                                                    <div class="product-widget-checkbox"><input type="checkbox"
                                                            id="chcek{{ $category->id }}" class="parent-category"
                                                            data-id="{{ $category->id }}"></div>
                                                    <label class="product-widget-label" for="chcek9"><span
                                                            class="product-widget-text ">
                                                            {{ $category->category_name }}</span></label>
                                                </li>
                                            @endforeach
                                        @endif
                                        {{-- <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek10"></div>
                                            <label class="product-widget-label" for="chcek10"><span
                                                    class="product-widget-text">Arts</span></label>
                                        </li> --}}
                                        {{-- <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek11"></div>
                                            <label class="product-widget-label" for="chcek11"><span
                                                    class="product-widget-text">Baby gear</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek12"></div>
                                            <label class="product-widget-label" for="chcek12"><span
                                                    class="product-widget-text">Books</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek13"></div>
                                            <label class="product-widget-label" for="chcek13"><span
                                                    class="product-widget-text">Building & renovation</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek14"></div>
                                            <label class="product-widget-label" for="chcek14"><span
                                                    class="product-widget-text">Business,farming & Industry</span></label>
                                        </li> --}}

                                    </ul>

                                    <hr>

                                    <div class="sub-category"></div>
                                    {{-- <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek9"></div>
                                            <label class="product-widget-label" for="chcek9"><span
                                                    class="product-widget-text">Antiques & Collectables</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek10"></div>
                                            <label class="product-widget-label" for="chcek10"><span
                                                    class="product-widget-text">Arts</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek11"></div>
                                            <label class="product-widget-label" for="chcek11"><span
                                                    class="product-widget-text">Baby gear</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek12"></div>
                                            <label class="product-widget-label" for="chcek12"><span
                                                    class="product-widget-text">Books</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek13"></div>
                                            <label class="product-widget-label" for="chcek13"><span
                                                    class="product-widget-text">Building & renovation</span></label>
                                        </li>
                                        <li class="product-widget-item">
                                            <div class="product-widget-checkbox"><input type="checkbox" id="chcek14"></div>
                                            <label class="product-widget-label" for="chcek14"><span
                                                    class="product-widget-text">Business,farming & Industry</span></label>
                                        </li>

                                    </ul> --}}

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
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
                    </div>
                    <div class="row">
                        @if ($products)
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                                    <div class="product-card">
                                        <div class="product-media resimg">
                                            <a href="{{ url('product/detail/' . $product->slug) }}">

                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product">
                                                    @endif
                                                </div>
                                                <div class="product-type">
                                                    <div class="product-btn">
                                                        @if (Auth::check())
                                                            <button type="button" title="Wishlist"
                                                                data-id="{{ $product->id }}"
                                                                class="@if ($product->wishlist) @if ($product->wishlist->user_id == Auth::user()->id) 
                                                    fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
                                                        @endif
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                        <div class="product-content">
                                            <ol class="breadcrumb product-category">
                                                <li>
                                                    <p class="product-price tblak"> रू</p>
                                                </li>
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('product/detail/' . $product->slug) }}">
                                                        {{ number_format($product->price) }}</a></li>
                                            </ol>
                                            <div class="product-meta"><span>{{ ucwords($product->title) }}</span><br>
                                                <span class="s-used">Used</span>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $('.parent-category').on('click', function() {
            var id = $(this).data('id');
            if ($("#chcek" + id).prop('checked') == true) {
                $.ajax({
                    type: "post",
                    url: base_url + 'search/sub-category',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var dataList = result.html;
                        $('.sub-category').append(dataList);
                    },
                    error: function(result) {

                    }
                })
            } else {
                $('.hide-sub-category'+id).hide();
            }
        })
    </script>
@endsection

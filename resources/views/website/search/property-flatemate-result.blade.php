@if($products->count() > 0)
@foreach ($products as $product)

<style>
    .bs {
    box-shadow: unset !important;
}
</style>
    
<div class="product-card standard image-heg bshadow mb20">
<div class="product-media resimg">
    <a href="{{ url('property-detail/' . $product->slug) }}">
    <div class="product-img">
        @if ($product->image)
                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                            alt="product">
                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                            alt="product">
                    @endif</div>
    </a>
</div>
<div class="product-content">
    <div class="product-info text-cont">
        <ol class="breadcrumb product-category">
            <h5 class="product-title"><a href="{{ url('property-detail/' . $product->slug) }}">{{ ucwords($product->title) }}  @if(isset($product->propertyFeature->bedrooms)) ,
                {{$product->propertyFeature->bedrooms}} bedrooms @endif</a></h5>
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item active s-success" aria-current="page">Available Now
            </li> --}}
        </ol>
        {{-- <h5 class="ffs16">Listed Today</h5> --}}
    </div>
    {{-- <div class="product-meta"><span class="mfs14l">{{ ucwords($product->title) }}</span>&nbsp;</div> --}}
    <div class="product-meta"><span class="fs18l4">रू {{number_format($product->price)}} per week
        </span></div>
    {{-- <div class="product-info text-cont">
        <span class="fs16 tcolor1"><i class="fa fa-users"></i> 2 existing
            flatmates</span>
    </div> --}}
</div>
</div>
@endforeach
@else
@include('website.no-data')
@endif
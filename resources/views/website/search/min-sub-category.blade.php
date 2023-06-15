@if ($minsubCategories)

<h6 id="hide-sub-category_{{ $categoryId }}" class="hide-sub-category" {{ $categoryId }}> {{ $category->category_name }}</h6>
<ul class="product-widget-list product-widget-scroll hide-sub-category" {{ $categoryId }}>
    
    
        @foreach ($minsubCategories as $categoryField)
            <li class="product-widget-item">
                <div class="product-widget-checkbox">
                    <input type="checkbox" id="chcek{{ $categoryField->id }}" class="@if($categoryField->slug == 'commercial-other-vehicles') min-sub-category-data @else sub-category-data @endif  @if($categoryField->categories_id == 61 ) min-sub-category{{$categoryField->id}}  @else sub-category{{$categoryField->id}} @endif  filter"
                   @if(isset($url['minsubCategory'][0])) @if($url['minsubCategory'][0] == $categoryField->id) checked @endif @endif
                     data-id="{{ $categoryField->id }}">
                </div>
                <label class="product-widget-label" for="chcek{{ $categoryField->id }}">
                    <span class="product-widget-text">{{ ucwords($categoryField->category_name) }}</span></label>
            </li>
        @endforeach
</ul>
@endif

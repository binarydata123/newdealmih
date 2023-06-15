<div class="col-lg-12">
    <div class="niche-nav">
        <ul class="nav nav-tabs tableftsq">
            @if($subCategories->count() > 0)
            
            
            <input type="text" name="subCategory[]" class="sub-cate-first-val"  value="{{$subCategories[0]['id']}}" id="" hidden>

                @foreach ($subCategories as $key => $subCategory)
            <li>
                <a href="#all" class="nav-link @if($key+1 == 1) active @endif category-sub" data-content="{{$subCategory->slug}}" data-id="{{$subCategory->id}}"
                 data-toggle="tab" @if($subCategory->slug == 'flat-or-room-mates') data-content="flat-or-room-mates" @endif>
                 @if ($subCategory->slug == 'for-sale-houses-apartments' || $subCategory->slug == 'for-sale-shop-office-land')
                For Sale
                 @elseif($subCategory->slug == 'for-rent-houses-apartments' || $subCategory->slug == 'for-rent-shop-office-land')
                For Rent
                @elseif($subCategory->slug == 'flat-or-room-mates')
                Flatemates
                @else
                {{ucwords($subCategory->category_name)}}
                 @endif</a>
                </li>
            @endforeach
        @endif

        @if(isset($subCategoriesid))

        <input type="text" name="subCategory[]" class="sub-cate-first-val"  value="{{$subCategoriesid}}" id="" hidden>

        @endif


            {{-- <li><a href="#new" class="nav-link" data-toggle="tab">For Rent</a></li>
            <li><a href="#used" class="nav-link" data-toggle="tab">Flatmates</a></li> --}}
        </ul>
         
    </div>
</div>
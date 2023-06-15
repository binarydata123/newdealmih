@extends('website.layout.app')
@section('css')
<link rel="stylesheet" href="{{url('public/website/css/custom/interested-categories.css')}}">
@endsection
@section('content')
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                    <div class="account-card alert fade show bs">
                        <div class="account-title wishlist1">
                            <h6>Interested Categories</h6>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" align="center">
                                <ul class="icc">
                                    @if ($categories)
                                        @foreach ($categories as $key => $category)
                                            <li>
                                               
                                                <input type="checkbox" id="myCheckbox{{ $key + 1 }}" data-id="{{$key+1}}"
                                                   @if($category->interestedCategories) checked @endif
                                                    value="{{ $category->id }}" class="category" />
                                                <label for="myCheckbox{{ $key + 1 }}" class="bshadow resimgcat"><img
                                                       @if($category->thumbnail)
                                                       src="{{asset('media/category-image/'.$category->thumbnail)}}"  @else src="{{ url('public/website/images/dea/c1.png') }}" @endif />
                                                    <div align="center" class="nss">{{ ucwords($category->category_name) }}</div>
                                                </label>
                                            </li>
                                        @endforeach
                                    @endif

                                    {{-- <li>
                                        <input type="checkbox" id="myCheckbox2" />
                                        <label for="myCheckbox2" class="bshadow"><img
                                                src="{{ url('public/website/images/dea/c2.png') }}" />
                                            <div align="center">Food</div>
                                        </label>
                                    </li> --}}
                                    {{-- <li>
                                        <input type="checkbox" id="myCheckbox3" />
                                        <label for="myCheckbox3" class="bshadow"><img
                                                src="{{ url('public/website/images/dea/c3.png') }}" />
                                            <div align="center">Footwear</div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="myCheckbox4" />
                                        <label for="myCheckbox4" class="bshadow"><img
                                                src="{{ url('public/website/images/dea/c4.png') }}" />
                                            <div align="center">Groceries</div>
                                        </label>
                                    </li> --}}
                                </ul>
                                <div class="col-lg-12 mt20">
                                    <input type="submit" class="btn btn-inline post-btn sv interest-category" value="Save">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection
@section('js')
    <script>
        var arrayCategory = [];
        var arrayCategoryUnchecked = [];
        var id = "";
        var dataId = "";
        
        $('.category').on('click', function() {
            dataId = $(this).data('id');
            if ($("#myCheckbox"+dataId).prop('checked') == true) {
                    id = $(this).val();
                    arrayCategory.push(id);
            }else
            {

            if ((index = arrayCategory.indexOf($(this).val())) !== -1) {
                arrayCategory.splice(index, 1);
                }
                else
                {
                    id = $(this).val();
                    arrayCategoryUnchecked.push(id);  
                }

            }
            
        })
        $('.interest-category').on('click', function() {
            var url = base_url + "interested-category";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    interestedCategory: arrayCategory,unchecked:arrayCategoryUnchecked
                },
                success: function(result) {
                    if(result.status == true)
                    {
                        window.location.href = "/";
                    }
                },
                erorr: function(result) {

                }
            })
        });
    </script>
@endsection

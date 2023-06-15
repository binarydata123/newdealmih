@if ($stores->count() > 0)
    @foreach ($stores as $store)

        <div class="col-md-3 col-lg-3">
            <div class="blog-card">
                <div class="blog-img resimg">

                    <img @if ($store->company_cover_pic)
                    src="{{ url('public/media/company-cover-pic/' . $store->company_cover_pic) }}"
                @else src="{{ url('public/website/images/blog/02.jpg') }}" @endif alt="blog">
                </div>
                <div class="blog-content ">

                    <a href="{{ url('store-profile', $store->id) }}" class="blog-avatar"><img @if ($store->company_log)
                        src="{{ url('public/media/company-cover-pic/' . $store->company_log) }}"
                    @else src="{{ url('public/website/images/dea/job/dp.png') }}" @endif alt="avatar"></a>
                    <div class="blog-text">
                        <h4><a href="{{ url('store-profile', $store->id) }}">{{ $store->business_name }}</a></h4>
                        <p>{{ $store->about_company }}</p>
                    </div>
                    <a href="{{ url('store-profile', $store->id) }}" class="blog-read"><span>View Store</span><i
                            class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>

    @endforeach
    @else
    @include('website.no-data')
@endif

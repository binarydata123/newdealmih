@extends('website.layout.app')
@section('css')
@endsection
@section('content')

@php
$products = App\Models\Product::getjobs(Auth::user()->id);
@endphp

<style type="text/css">
       .product-content .product-price {
        font-size: 14px;
    }

    span.job {
        font-size: 15px;
    }
img#data-img {
    width: 400px;
    height: 200px;
    max-width: 100% !important;
}
span.text {
     padding-left: 0 !important; 
}
.post-btn{
    margin-top: 0;
}
.product-meta{
    margin-bottom: 20px;
}
    /*.tab-pane{
    padding: 0px !important;
}*/
    /*.account-card {
    padding: 0px 0px 30px !important;
}*/
    .ad-standard .product-card.standard.image-heg .product-img img {
        min-height: unset !important;
        width: 250px !important;
    }

    .row.ad-standard .product-card.standard {
        box-shadow: 0px 10px 15px 0px rgba(0, 0, 0, 0.1) !important;
        transition: all linear 0.3s;
        -webkit-transition: all linear 0.3s;
        -moz-transition: all linear 0.3s;
        -ms-transition: all linear 0.3s;
        -o-transition: all linear 0.3s;

    }

    a.vall2 {
        margin-top: 6px !important;
    }

    .wishlist1 a {
        font-size: 18px;
        padding: 0px !important;
    }
</style>


<link rel="stylesheet" href="{{url('public/website/css/custom/message.css')}}">


<section class="dashboard-part">
    <div class="container-fluid">
        <div class="row">
            @include('website.dashboard.dashboard')
            <div class="col-lg-9">
                <div class="account-card alert fade show bs">


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="niche-nav">
                                <ul class="nav nav-tabs">
                                    <li><a href="#ratings" class="nav-link @if(isset($_GET['job_profile'])) {{$_GET['job_profile']}} @endif" data-toggle="tab"> Job Profile</a></li>
                                    <li><a href="#job-applied" class="nav-link @if(isset($_GET['job-applied'])) {{$_GET['job-applied']}} @endif" data-toggle="tab"> Jobs Applied</a></li>
                                    <li><a href="#job-post1" class="nav-link @if(isset($_GET['job_post'])) {{$_GET['job_post']}} @endif" data-toggle="tab"> My Jobs Post</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>


                    <!--tab1-->
                    <div class="tab-pane @if(isset($_GET['job_profile'])) {{$_GET['job_profile']}} @endif" id="ratings">
                        <div class="row wishlist1 mt20 mb20">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                 @if(request()->query('job_profile'))

                                    @if (session()->has('success'))
                                    <div class="alert alert-success text-center" style="padding: 10px 0;">
                                        {{ session()->get('success') }}
                                    </div>
                                    @endif

                                    @if(session()->has('message'))
                                        <div class="alert alert-danger" style="padding: 10px 0;"> 
                                           {{ session()->get('message') }}
                                        </div>
                                    @endif

                                    @endif

                                <div class=" mt0 mb20">
                                   
                                    <h4 class="fs20">Update Profile</h4>
                                    <hr>
                                    <form method="post" action="{{ url('apply-job-submit') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row ml0">
                                            <div class="col-lg-6">
                                               
                                                <div class="form-group mt15">
                                                    <fieldset>
                                                        <legend class="mbm12">First Name</legend>
                                                        <input class="form-control b0" type="text" name="firstname" placeholder="First Name" @if(isset($userprofile->first_name))value="{{$userprofile->first_name}}"@endif required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mt15">
                                                    <fieldset>
                                                        <legend class="mbm12">Last Name</legend>
                                                        <input class="form-control b0" type="text" name="lastname" placeholder="Last Name" @if(isset($userprofile->last_name))value="{{$userprofile->last_name}}"@endif required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mt15">
                                                    <fieldset>
                                                        <legend class="mbm12">Email</legend>
                                                        <input class="form-control b0" type="text" name="email" placeholder="Your Email" @if(isset($userprofile->email))value="{{$userprofile->email}}"@endif required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mt15">
                                                    <fieldset>
                                                        <legend class="mbm12">Phone Number</legend>
                                                        <input class="form-control b0" type="text" name="phonenumber" placeholder="Phone Number" @if(isset($userprofile->phone_number))value="{{$userprofile->phone_number}}"@endif required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Upload CV</label>
                                                    <input type="file" class="form-control ldash" name="profile_file" id="profile_file" required>

                                                   

                                                    @if(isset($userprofile->upload))
                                                    <a href="" style="color: #17181d;font-size: 12px;"> </a>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mt15">
                                                    <fieldset>
                                                        <textarea class="form-control b0 coverletter-ckeditor" type="text" name="coverletter" placeholder="Cover letter" required> @if(isset($userprofile->cover_letter)) {{$userprofile->cover_letter}}@endif </textarea>
                                                    </fieldset>
                                                </div>
                                            </div>




                                            <div align="right" class="col-lg-12">
                                                <button href="" class="btn btn-inline fil mb10"><span>Save</span></button>
                                            </div>
                                        </div>

                                    </form>





                                </div>


                            </div>
                        </div>

                       


                    </div>

                    


                    <!--tab1-->


                    <!--tab2-->




                    <div class="tab-pane @if(isset($_GET['job-applied'])) {{$_GET['job-applied']}} @endif" id="job-applied">
                        <div class="row wishlist1 mt20 mb20">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                  @if(request()->query('job-applied'))

                    @if (session()->has('success'))
                    <div class="alert alert-success text-center" style="padding: 10px 0;">
                        {{ session()->get('success') }}
                    </div>
                    @endif

                    @endif
                                @if(isset($appliedjobs))
                                @foreach ($appliedjobs as $jobs)

                                <div class="product-card mb20 mt0">
                                    <h4 class="fs20"> </h4>

                                    <div class="product-content">
                                        <div class="breadcrumb product-category">
                                            <div class="ml20">
                                                <p class="breadcrumb-item"><a href="{{ url('jobs-detail/' . $jobs->slug) }}" class="fs18l3">{{ ucwords($jobs->title) }}</a></p>
                                                <p class="ml15">
                                                <p class="">{!! str_limit($jobs->description, 50) !!}</p>
                                                </p>
                                                <p>
                                                    <a href="{{ url('jobs-detail/' . $jobs->slug) }}">
                                                        <img @if (isset($jobs->seller_image))
                                                        src="{{ url('public/media/seller-image/' . $jobs->seller_image) }}"
                                                        @else src="{{ url('public/website/images/favicon.png') }}"
                                                        @endif
                                                        class="mb20" width="48">
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <span><i class="fas fa-map-marker-alt"></i> @if ($jobs->districtList){{ $jobs->districtList->district_name }} @endif
                                            </span>
                                            <div> <span>
                                                    Closes: {{ $jobs->created_at->addDays(30)->format('D d M') }}
                                                </span></div>
                                        </div>
                                    </div>


                                </div>
                                @endforeach

                                @else
                                @include('website.no-data')

                                @endif

                            </div>

                        </div>

                       

                    </div>
                   

                    <div class="tab-pane @if(isset($_GET['job_post'])) {{$_GET['job_post']}} @endif" id="job-post1">
                        <div class="row  wishlist1 mt20 mb20">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                 @if(request()->query('job_post'))

                                        @if (session()->has('success'))
                                        <div class="alert alert-success text-center" style="padding: 10px 0;">
                                            {{ session()->get('success') }}
                                        </div>
                                        @endif

                                        @endif 
                                @if ($products->count() > 0)
                                @foreach ($products as $product)


                                <div class="product-info wrapinfo mt0">
                                    <p class="product-title">
                                        <!-- <a href="#">
                                                Order ID: 44253457{{ $product->id }}</a>  -->
                                    </p>
                                    <div>
                                        <button type="button" title="Wishlist" data-id="{{$product->id}}" data-content="product" class="far fa-trash-alt tred fs18w delete"></button>
                                    </div>
                                </div>
                                <div class="product-card standard image-heg">
                                    <a href="{{url('/jobs-detail',$product->productslug)}}">
                                        <div class="product-media">

                                            <div class="product-img">
                                                @if ($product->seller_image)
                                                <img src="{{ url('public/media/seller-image/' . $product->seller_image) }}" alt="product" id="data-img">
                                                @else
                                                <img src="{{ url('public/website/images/no-image.png') }}" alt="product" id="data-img">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product-content">

                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><a href="{{url('/jobs-detail',$product->productslug)}}">{{ ucwords($product->title) }}</a></h5>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                {{-- @if ($product->type == 1)
                                                            <span class="s-used">Used</span>
                                                        @else
                                                            <li class="s-success">Brand New</li>
                                                        @endif --}}
                                                {{-- <li class="breadcrumb-item active" aria-current="page">Brand New
                                                        </li> --}}
                                            </ol>
                                            <p class="product-price">रू {{ number_format($product->salary_scal) }}
                                            </p>
                                        </div>
                                        <div class="product-meta"><!-- <span>Closes :
                                            </span> -->
                                            <br> <span>@if($product->is_approved == 1)
                                                Your ad is live or Active.
                                                @else Under review by admin @endif</span>

                                                @php
                                                 $job_application = DB::table('job_applications')->where('job_id', $product->id)->first();
                                                 $jobcount = DB::table('job_applications')->where('job_id', $product->id)->count();
                                               @endphp

                                            @if($job_application)
                                            <div class="col-sm-4 pl-0">
                                                <a href="{{url('/apply-job-users', $product->id)}}" style="cursor: pointer;text-decoration: underline;"><span class="text">Applicants ({{$jobcount}})</span></a>
                                            </div>
                                            @else
                                            <div class="col-sm-4 pl-0" data-toggle="modal" data-target="#job_modal">
                                                <a style="cursor: pointer;text-decoration: underline;" id="job"><span class="text"> Applicants ({{$jobcount}}) </span></a></button>
                                                <div class="modal fade" id="job_modal" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!--  <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                              </div> -->
                                                            <div class="modal-body">
                                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                                <span class="job">Nobody has applied to this job yet.<span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <a class="post-btn job_applied" style="cursor: pointer;text-decoration: underline;"><span> Applied Job Users </span></a> -->
                                            </div>
                                            @endif
                                        </div>

                                        <div class="row product-info text-cont">
                                            @if($product->is_sold == '1')
                                            <div class="col-sm-4">
                                                <a data-id="{{$product->id}}" class="post-btn status_change" data-content="0" data-type-row="product" data-type="@if($product->is_sold=='0') Activated @else Active @endif" style="cursor: pointer;text-decoration: underline;"><span>Mark as Active</span></a>
                                            </div>
                                            @else
                                            <div class="col-sm-4">
                                                <a data-id="{{$product->id}}" class="post-btn status_change" data-content="1" data-type-row="product" data-type="@if($product->is_sold=='1') Closed @else Close @endif" style="cursor: pointer;text-decoration: underline;"><span>Mark as Close</span></a>
                                            </div>
                                            @endif
                                            @if($product->is_sold == '2')
                                            <div class="col-sm-2">
                                                <a data-id="{{$product->id}}" class="post-btn status_change" data-content="0" data-type-row="product" data-type="@if($product->is_sold=='0') UnPaused @else UnPause @endif" style="cursor: pointer;text-decoration: underline;"><span> UnPause </span></a>
                                            </div>
                                            @else
                                            <div class="col-sm-2">
                                                <a data-id="{{$product->id}}" class="post-btn status_change" data-content="2" data-type-row="product" data-type="@if($product->is_sold=='2') Paused @else Pause @endif" style="cursor: pointer;text-decoration: underline;"><span> Pause </span></a>
                                            </div>
                                            @endif
                                            
                                            <!-- <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div>
                                                        <div>&nbsp;&nbsp;</div> -->
                                            <div class="col-sm-2 text-right">
                                                <a href="{{url('product/edit',$product->productslug)}}" class="vall2"><span>Edit</span></a>
                                            </div>
                                            {{-- <a href="#" class="btn btn-inline post-btn"><span>Quick
                                                            Relist</span></a> --}}


                                        </div>
                                    </div>

                                </div>

                                @endforeach
                                
                                @else
                                @include('website.no-data')

                                @endif
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script src="{{url('public/website/js/classified/delete.js')}}"></script>
<script>
    // sold or unsold product status change
    $('.status_change').on('click', function() {
        var id = $(this).data('id');
        var value = $(this).data('content');
        var msg = $(this).data('type').trim();
        var type = $(this).data('type-row').trim();
        var newtext = $(this).text().trim();
        if (type == 'product') {
            if (msg == 'Close') {
                textmsg = 'Are you sure to close this job ?';
            }
            if (msg == 'Active') {
                textmsg = 'Are you sure to active this job ?';
            }
            if (msg == 'Pause') {
                textmsg = 'Are you sure to pause this job ?';
            }
            if (msg == 'UnPause') {
                textmsg = 'Are you sure to UnPause this job ?';
            }
        }
        swal({
                //title: "Are you sure ?",
                text: textmsg,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: base_url + "product/change-job-status",
                        data: {
                            id: id,
                            value: value
                        },
                        success: function(result) {
                            if (result.status == true) {
                                location.reload();
                            }
                        },
                        error: function() {

                        }
                    })
                }
            });
    })
</script>

<script>
    $(document).ready(function() {
        $("#job").click(function() {
            $('#job_modal').modal({
                show: true
            });
        });
    });
</script>
<script>
    var allEditors = document.querySelectorAll('.coverletter-ckeditor');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(
            allEditors[i], {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
            },
        );
    }
</script>
@endsection
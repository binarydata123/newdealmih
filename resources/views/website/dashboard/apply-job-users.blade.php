@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<section class="dashboard-part">
    <div class="container-fluid">
        <div class="row">
            @include('website.dashboard.dashboard')
            <div class="col-lg-9">
                <div class="account-card alert fade show bs">
                    <div class="account-title wishlist1">
                        <h6>Job Applicants ({{$jobcount}})</h6>
                        <!-- <span class="sep"> <a  href="#" data-content="allnotification" data-id="{{Auth::user()->id}}" class="clrall delete"> Clear all</a></span> -->
                    </div>
                    <div class="row wishlist1 mt20 mb20">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            @if($jobapplication_data->count() > 0)
                                @foreach($jobapplication_data as $jobapplication)
                                    @php
                                        $products = DB::table('products')->where('id', $jobapplication->job_id)->first();
                                        $user_job_profiles_data = DB::table('user_job_profiles')->where('user_id', $jobapplication->user_id)->first();
                                    @endphp
                                    <div class="product-card mb20 mt0">
                                        <h4 class="fs20"> </h4>
                                        <div class="product-content">
                                            <div class="breadcrumb product-category" style="display: block;">
                                                <div class="row ml20">
                                                    <div class="col-lg-9">
                                                        <p class=""><strong>{{ ucwords($user_job_profiles_data->first_name) }} {{ucwords($user_job_profiles_data->last_name)}}</strong></p>
                                                        <p class="breadcrumb-item"><a href="mailto:{{$user_job_profiles_data->email}}" style="padding: 0px;">{{ $user_job_profiles_data->email }}</a></p>
                                                        <p class=""><a href="tel:+{{$user_job_profiles_data->phone_number}}" style="padding: 0px;">{{ $user_job_profiles_data->phone_number }}</a></p>
                                                        <p class="ml15">
                                                            <p class="">{!! str_limit($user_job_profiles_data->cover_letter, 50) !!}<a href="javascript:void(0)" class="" data-toggle="modal" data-target="#exampleModal">
                                                          View more
                                                        </a></p>
                                                        </p>
                                                        <!-- Button trigger modal -->
                                                        

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Cover Letter</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                {!! $user_job_profiles_data->cover_letter !!}
                                                              </div>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style="text-align: right;">
                                                            <a href="{{ url('/media/product-multi-image/' . $user_job_profiles_data->upload) }}" target="_blank">
                                                                <img src="{{url('public/media/user-document/pdf_icon.png')}}" width="100" height="100">
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                @php
                                                    $district_data = DB::table('districts')->where('district_id', $products->district)->first();
                                                @endphp
                                                <span><i class="fas fa-map-marker-alt"></i> @if ($district_data){{ $district_data->district_name }} @endif
                                                </span>
                                                <div> 
                                                    <span> Apply Date: {{ date('j F, Y h:i A', strtotime($user_job_profiles_data->created_at)) }}</span>
                                                </div>
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
</section>
@endsection

@section('js')
<script src="{{url('public/website/js/classified/delete.js')}}"></script>
@endsection
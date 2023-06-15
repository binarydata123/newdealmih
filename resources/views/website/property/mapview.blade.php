@extends('website.layout.app')
@section('css')
@endsection
@section('content')



    <section class="inner-section ad-list-part mt40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb20 fs14">Home/Property/ <a href="#!">List View </a></p>
                </div>
                @include('website.search.filter')
                <div class="col-lg-8 col-xl-9">
                    <div class="row mb20">
                        <div class="col-lg-3">
                            <div class="header-filter">
                                <h3>Property</h3>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="filter-short">
                                <!-- <label class="filter-label">Sort by :</label> -->
                                <select class="custom-select filter-select">
                                    <option selected>3 km</option>
                                    <option value="3">4 km</option>
                                    <option value="1">5 km</option>
                                    <option value="2">6 km</option>
                                </select>
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

                        <div class="col-lg-3">
                            <div class="mapview">
                             <a href="{{url('search/property')}}">   <i class="fa fa-map-marker" aria-hidden="true"></i> List View
                             </a></div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.64621395394!2d85.25609251320085!3d27.708942727046708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600%2C%20Nepal!5e0!3m2!1sen!2sin!4v1632912156081!5m2!1sen!2sin"
                                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="col-lg-8">
                            <div class="row bshadow">

                                <div class="col-lg-6 pr0">
                                    <div class="pr10">
                                        <img src="{{ url('public/website/images/dea/property/l1.jpg') }}"
                                            class="iresponsive">
                                        <img src="{{ url('public/website/images/dea/property/l2.jpg') }}"
                                            class="iresponsive mt10">

                                    </div>
                                </div>

                                <div class="col-lg-6 pl0 pr0">
                                    <div class="pr10">

                                        <img src="{{ url('public/website/images/dea/property/l3.jpg') }}"
                                            class="iresponsive rimg">
                                    </div>
                                </div>

                                <div class="col-lg-12 pl0 pr0">
                                    <p class="plist p10"> Auction - be quick! 23 Landing Road, Kerikeri, Far North,
                                        Northland
                                    </p>
                                    <div class="product-info text-cont mb10">
                                        <p class="fs14500"><i class="fa fa-bed"></i> 1 Bed</p>
                                        <p class="fs14500 mlm50"><i class="fa fa-shower"></i> 1 Bath</p>
                                        <p class="fs14500 mlm50"><i class="fa fa-cube"></i> 60m<sup>2</sup> Floor</p>
                                        <div>
                                            <a href="#!" class="btn btn-inline post-btn w100"><span>View
                                                    Property</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12 bshadow p10 bglight">
                                        <img src="{{ url('public/website/images/dea/property/l4.jpg') }}"
                                            class="iresponsive br5">
                                        <h6 class="plist mt10 mb10">New Era Home Ltd</h6>
                                        <p class="fs14l">Buying make hassle free with lost cost EMI
                                            Options and low commission</p>

                                        <a href="#!" class="roundbtn mt10">Register</a>
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

<script src="{{ url('public/website/js/classified/search.js') }}"></script>
   
@endsection

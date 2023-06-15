@extends('website.layout.app')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
@section('css')
    <style>
        /* delete button  image  */
        .img-wraps {
            position: relative;
            display: inline-block;

            font-size: 0;
        }

        .img-wraps:hover .closes {
            opacity: 1;
        }

        .img-wraps .closes {
            position: absolute;
            top: -113px;
            right: -1px;
            z-index: 100;
            background-color: #FFF;
            padding: 4px 3px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
            line-height: 3px;
            border-radius: 50%;
            /* border:1px solid red; */
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #c7c7c7 !important;
            border-radius: 4px;
            height: 40px !important;
            padding-top: 6px !important;
        }

    </style>
@endsection
@section('content')
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content">

            </div>
        </div>
        <div class="user-form-category">
            <div class="tab-pane active" id="login-tab">

                @if (session()->has('success'))
                    <div class="alert alert-success text-center" style="padding: 10px 0;">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if (session()->has('error'))

                    <div class="alert alert-danger text-center" style="padding: 10px 0;">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div align="right">
                    <a href="#!" data-toggle="modal" data-target="#help" class="nh">Need help?</a>
                </div>
                <div class="user-form-title mb0" align="left">
                    <h4><i class="fas fa-arrow-left"></i> &nbsp; List an Item</h4>
                </div>
                <div>
                    <div class="col-md-10 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="msform" action="{{ url('create/product') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row ml0">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" 
                                                placeholder="Title">
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group"><input type="text" class="form-control" 
                                                placeholder="Location"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="job_type" id="job_type" class="form-control">
                                                <option value="">Select Job Type</option>
                                                <option value="1">All Job Types</option>
                                                <option value="2">Full</option>
                                                <option value="3">Part</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="job_type" id="duration" class="form-control">
                                                <option value="">Select Duration</option>
                                                <option value="1">Contract</option>
                                                <option value="2">Temparary</option>
                                                <option value="3">Permanant</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!------------>
            </div>

        </div>
    </section>
@endsection
@section('js')
    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="{{ url('public/website/js/classified/product.js') }}"></script>
    <script>
        $('.district').select2({
            selectOnClose: true
        });
        $('.municipality').select2({
            selectOnClose: true
        });
        $('.village').select2({
            selectOnClose: true
        });
        $('.auction_end_date').datetimepicker({
            format: 'YYYY-MM-DD',

        });
    </script>
@endsection

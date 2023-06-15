@extends('website.layout.app')
@section('css')
@endsection
@section('content')
@include('website.no-data')
<div class="modal fade" id="language">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         
            <div class="modal-body" align="center">
                <h4 class="mfs24">Payment Successful</h4>
                <p class="sgreen">Your Order has been placed Successfully</p>
                <img src="{{ url('public/website/images/dea/bid_succes.png') }}" class="iresponsive mt10">
                <div class="col-md-10"> <a href="{{url('order')}}" class="btn btn-inline2 post-btn2"
                        ><span>Go to My Orders</span></a></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
       $('#language').modal('show');
    });
</script>
@endsection
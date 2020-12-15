@extends('layouts.master2')



@section('title')
@endsection






@section('content')
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-cart-simple text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">My Orders</p>
                            <p class="card-title">{{count($myorders)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i onClick="window.location.href=window.location.href" class="fa fa-refresh"></i>
                    Update Now
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">

                                <i class="fa fa-usd text-warning" aria-hidden="true"></i>

                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Revenue</p>
                                <p class="card-title">

                                    <small>
                                        {{$myexpenses}} MAD
                                    </small>

                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i>
                        Last day
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



@section('scripts')
    <script>
        @if(Session::has('success'))

        toastr.success("{{Session::get('success')}}")

        @endif
    </script>
@endsection


@extends('layouts.master')



@section('title')
    Dashboard
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
                                <p class="card-category">All Orders</p>
                                <p class="card-title">{{count($orders)}}</p>
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
                                <i class="nc-icon nc-check-2 text-success"></i>

                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Delivered Orders</p>
                                <p class="card-title">{{count($deliveredorders)}}<p>
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
                                <i class="nc-icon nc-globe "></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Stock Capital</p>
                                  <small>
                                    <small>

                                   {{$products *$dvproducts}}
                                          MAD
                                      </small>
                                </small>

                                {{--                                @foreach($dvproducts as $dvproduct)--}}

{{--                                <p class="card-title"> {{ $dvproduct->product->costperone * $dvproduct->quantity }}      <p>--}}
{{--                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a onClick="window.location.href=window.location.href">
                            <i class="fa fa-refresh"></i>
                            Update Now
                        </a>

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
    <small>
        {{$floss}} MAD
    </small>
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

        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Last 3 Months Completed Orders</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <?php
                $current_month = date('M');
                $last_month = date('M',strtotime("-1 month"));
                $before_last_month = date('M',strtotime("-2 month"));
                $dataPoints = array(
                    array("y" => $before_last_month_orders, "label" => "    $before_last_month " ),
                    array("y" => $last_month_orders, "label" => "$last_month "),
                    array("y" => $current_month_orders , "label" => "$current_month "),
                );

                ?>

                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                <div class="card-footer">
                    <hr>
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Overview Orders ( delivery )</h5>

                </div>
                <?php

                $dataPointsS = array(
                    array("label"=>"On way", "symbol" => "Si","y"=>$onwayperc,"z"=>$onway),
                    array("label"=>"Delivered", "symbol" => "O","y"=>$deliveredperc ,"z"=>$delivered),
                    array("label"=>"Refused/Returned", "symbol" => "Si","y"=>$refusedperc,"z"=>$rr),
                    array("label"=>"New", "symbol" => "Si","y"=>$newperc,"z"=>$new),
                    array("label"=>"No Answer", "symbol" => "Si","y"=>$noanswerperc,"z"=>$noanswer),
                    array("label"=>"Confirmed", "symbol" => "Si","y"=>$confirmedperc,"z"=>$confirmed),
                )

                ?>
                <div id="chart" style="height: 400px; width: 100%;"></div>
                <div class="card-footer">
                    <hr>
                    <div class="card-stats">
                        <i class="fa fa-check"></i>         Data information certified
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection



@section('scripts')
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                axisY: {

                },

                data: [{
                    type: "spline",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();


            var chart = new CanvasJS.Chart("chart", {
                theme: "light2",
                animationEnabled: true,

                data: [{
                    type: "doughnut",
                    yValueFormatString: "#,##0\"%\"",
                    showInLegend: true,
                    legendText: " {label}  :  {z}  " ,
                    dataPoints: <?php echo json_encode($dataPointsS, JSON_NUMERIC_CHECK); ?>
                }]

            });
            chart.render();
        }
    </script>
    <script>
        @if(Session::has('success'))

        toastr.success("{{Session::get('success')}}")

        @endif
    </script>



@endsection

@extends('layouts.master2')



@section('title')
@endsection






@section('content')
    <style>


        .flash{
            background-color: rgb(255, 255, 238);
            border-width: 0px;
            border-left: 15px solid rgb(255, 240, 106);
            border-radius: 0px;
            box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
            font-family: 'Old Standard TT', serif;
            letter-spacing: 1px;
        }
    </style>
    <style>
        .tooltip {
            position: absolute;
            z-index: 1070;
            display: block;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-style: normal;
            font-weight: 400;
            line-height: 1.42857143;
            line-break: auto;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            word-wrap: normal;
            white-space: normal;
            font-size: 12px;
            filter: alpha(opacity=0);
            opacity: 0
        }

        .tooltip.in {
            filter: alpha(opacity=90);
            opacity: .9
        }

        .tooltip.top {
            padding: 5px 0;
            margin-top: -3px
        }

        .tooltip.right {
            padding: 0 5px;
            margin-left: 3px
        }

        .tooltip.bottom {
            padding: 5px 0;
            margin-top: 3px
        }

        .tooltip.left {
            padding: 0 5px;
            margin-left: -3px
        }

        .tooltip.top .tooltip-arrow {
            bottom: 0;
            left: 50%;
            margin-left: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000
        }

        .tooltip.top-left .tooltip-arrow {
            right: 5px;
            bottom: 0;
            margin-bottom: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000
        }

        .tooltip.top-right .tooltip-arrow {
            bottom: 0;
            left: 5px;
            margin-bottom: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000
        }

        .tooltip.right .tooltip-arrow {
            top: 50%;
            left: 0;
            margin-top: -5px;
            border-width: 5px 5px 5px 0;
            border-right-color: #000
        }

        .tooltip.left .tooltip-arrow {
            top: 50%;
            right: 0;
            margin-top: -5px;
            border-width: 5px 0 5px 5px;
            border-left-color: #000
        }

        .tooltip.bottom .tooltip-arrow {
            top: 0;
            left: 50%;
            margin-left: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000
        }

        .tooltip.bottom-left .tooltip-arrow {
            top: 0;
            right: 5px;
            margin-top: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000
        }

        .tooltip.bottom-right .tooltip-arrow {
            top: 0;
            left: 5px;
            margin-top: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000
        }

        .tooltip-inner {
            max-width: 200px;
            padding: 3px 8px;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: 4px
        }

        .tooltip-arrow {
            position: absolute;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid
        }

        .flash{
            background-color: rgb(255, 255, 238);
            border-width: 0px;
            border-left: 15px solid rgb(255, 240, 106);
            border-radius: 0px;
            box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
            font-family: 'Old Standard TT', 'serif'


    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    @if(session('status'))
        <div class="alert alert-danger alert-dismissible fade show flash">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">
                    &times;
                </span>
            </button>


        </div>
    @endif

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <br/>
                        <div class="md-form">
                            <label>    Order ID of the delivery service     </label>
                            <input  type="text" class="form-control" id="recipient-name">
                        </div>
                        <br/>
                        <br/>
                        <div class="md-form">
                            <label>        Note     </label>
                            <textarea  type="text" id="message-text" class="form-control md-textarea" rows="3"></textarea>
                        </div>
                        <br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Orders</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Id
                    </th>

                    <th >
                        Action
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Client Name
                    </th>
                    <th >
                        Client City
                    </th>
                    <th >
                        Client phone
                    </th>
                    <th >
                        Product name
                    </th>
                    <th >
                        total price
                    </th>
                    <th >
                        Quantity
                    </th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)

                        <tr>
                            <td>
                                #{{$order ->id}}
                            </td>
                            <td>



{{--                                @if($order->order_status == 'Confirmed')--}}
{{--                                    <div   class="btn-group" role="group" aria-label="Third group">--}}
{{--                                        <form enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >--}}
{{--                                            @csrf--}}
{{--                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>--}}
{{--                                            <input name="order_status" type="hidden" value="Shipping"/>--}}

{{--                                            <a data-toggle="tooltip" data-placement="top" title="">--}}
{{--                                                <button  type="submit" class="btn btn-link">--}}
{{--                                                    <i class="fa fa-plane" aria-hidden="true"></i>--}}

{{--                                                </button>--}}
{{--                                            </a>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                @if( $order->order_status == 'Shipping'  )



                                    <div   class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Delivered" enctype="multipart/form-data" action="{{route('upred')}}" method="post" >
                                            @csrf

                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Delivered"/>
                                            <input  name="quantity" type="hidden" value="{{$order->quantity}}"/>
                                            <input  name="product_id" type="hidden" value="{{$order->product_id}}"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div>




                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="No Answer" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Nanswer"/>
                                            <a>
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>

                                    </div>





                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Refused" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Refused"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div>


                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Return" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Returned"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="fa fa-registered" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div>


                                @elseif($order->order_status == 'Delivered')
                                    <div   class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Reset" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Shipping"/>
                                            <input  name="quantity" type="hidden" value="{{$order->quantity}}"/>
                                            <input  name="product_id" type="hidden" value="{{$order->product_id}}"/>
                                            <a data-toggle="tooltip" data-placement="top" title="">
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="nc-icon nc-refresh-69" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div
                                @elseif( $order->order_status == 'Nanswer')
                                    <div   class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Delivery" enctype="multipart/form-data" action="{{route('upred')}}" method="post" >
                                            @csrf

                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Delivered"/>
                                            <input  name="quantity" type="hidden" value="{{$order->quantity}}"/>
                                            <input  name="product_id" type="hidden" value="{{$order->product_id}}"/>

                                            <a data-toggle="tooltip" data-placement="top" title="">
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>

                                        </form>
                                    </div>

{{--                                    <div  class="btn-group" role="group" aria-label="Third group">--}}
{{--                                        <a  data-toggle="tooltip" data-placement="top" title="Edit" href="http://127.0.0.1:8000/orders/{{$order ->id}}/edit" type="button" >--}}
{{--                                            <button type="button" class="btn btn-link"> <i class="fa fa-edit"></i>       </button>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Return" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Returned"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="fa fa-registered" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>

                                    </div>

                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Refused" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Refused"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                            </a>
                                        </form>

                                    </div>
                                    <div   class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Reset" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Shipping"/>
                                            <input  name="quantity" type="hidden" value="{{$order->quantity}}"/>
                                            <input  name="product_id" type="hidden" value="{{$order->product_id}}"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="nc-icon nc-refresh-69" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div>
                                @elseif( $order->order_status == 'Refused')

                                    <div   class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Reset" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Shipping"/>
                                            <input  name="quantity" type="hidden" value="{{$order->quantity}}"/>
                                            <input  name="product_id" type="hidden" value="{{$order->product_id}}"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="nc-icon nc-refresh-69" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div>
                                @elseif( $order->order_status == 'Returned')

                                    <div   class="btn-group" role="group" aria-label="Third group">
                                        <form data-toggle="tooltip" data-placement="top" title="Reset" enctype="multipart/form-data" action="{{route('updateorderstatus',['order'=>$order->id])}}" method="post" >
                                            @csrf
                                            <input  name="order_id" type="hidden" value="{{$order->id}}"/>
                                            <input name="order_status" type="hidden" value="Shipping"/>
                                            <input  name="quantity" type="hidden" value="{{$order->quantity}}"/>
                                            <input  name="product_id" type="hidden" value="{{$order->product_id}}"/>
                                            <a >
                                                <button  type="submit" class="btn btn-link">
                                                    <i class="nc-icon nc-refresh-69" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </div>
                                @endif

                            </td>
                            <td >
                                @if($order ->order_status == 'new')
                                    <span class="badge badge-pill badge-warning ">
                                    {{$order ->order_status}}
                                </span>
                                @elseif($order ->order_status == 'Confirmed')
                                    <span class="badge badge-pill badge-success ">
                                    {{$order ->order_status}}
                                </span>
                                @elseif($order ->order_status == 'Shipping')
                                    <span class="badge badge-pill badge-info ">
                                    On The Way...
                                    </span>
                                @elseif( $order ->order_status == 'Delivered'  )
                                    <span class="badge badge-pill badge-primary ">
                                    {{$order ->order_status}}
                                </span>
                                @elseif($order ->order_status == 'Returned')
                                    <span class="badge badge-pill badge-danger">
                                    Returned
                                </span>
                                @elseif($order ->order_status == 'Refused')
                                    <span class="badge badge-pill badge-danger">
                                   Refused
                                </span>
                                @elseif($order ->order_status == 'Nanswer')
                                    <span class="badge badge-pill badge-danger">
                                        No Answer
                                </span>

                                @endif


                            </td>
                            <td>
                                {{$order ->client_name}}
                            </td>
                            <td>
                                {{$order ->client_city}}
                            </td>
                            <td>
                                {{$order ->client_phone}}
                            </td>
                            <td>
                                <span >
                                    @foreach($products as $product )
                                        @if($order ->product_id == $product ->id   )
                                            <span class="badge ">  {{$product ->name}}</span>
                                        @endif
                                    @endforeach

                                </span>
                            </td>
                            <td >
                                <span class="badge ">  {{$order ->totalprice}} MAD</span>
                            </td>
                            <td >
                                <span class="badge ">  {{$order ->quantity}}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>





        @endsection



        @section('scripts')
            <script>
                $(".alert.flash").fadeTo(2000,500).slideUp(500,function(){

                    $(".alert.flash").slideUp(500);
                });
            </script>
            <script>
                @if(Session::has('warning'))

                toastr.warning("{{Session::get('warning')}}")

                @endif

                @if(Session::has('success'))

                toastr.success("{{Session::get('success')}}")

                @endif


            </script>
            <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                });

            </script>

@endsection

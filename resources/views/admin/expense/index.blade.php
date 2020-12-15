@extends('layouts.master')



@section('title')
    Dashboard
@endsection






@section('content')
    @include('sweetalert::alert')
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
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Expenses</h3>
                </div>
                <div class="col-4 text-right">
                    <a  href="/expense/create" class="btn btn-default btn-rounded mb-4" >Add Expense</a>
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
                        Category
                    </th>
                    <th >
                        Deliverer
                    </th>
                    <th >
                        Cost
                    </th>
                    <th >
                        Date
                    </th>
                    </thead>
                    <tbody>
                    </select>
                    @foreach($expenses as $ex)
                        <tr>
                            <td>
                                {{$ex ->id}}
                            </td>
                            <td>
                                @if( $ex->status == 'Pending')

                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <a data-toggle="tooltip" data-placement="top" title=" Edit "  href="/expense/{{$ex ->id}}/edit" type="button" >
                                            <button type="button" class="btn btn-link"><i class="fa fa-edit"></i></button>
                                        </a>
                                    </div>
                                <div class="btn-group" role="group" aria-label="Third group">
                                    <form action="{{route('expense.destroy',['expense'=>$ex->id])}}" id="lol"  method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <input  type="hidden" value="{{$ex->id}}" />

                                        <button type="submit" data-toggle="tooltip" data-placement="top" title=" Delete " class="btn btn-link lol"  ><i class="fa fa-trash"></i></button>

                                    </form>
                                </div>
                                <div   class="btn-group" role="group" aria-label="Third group">
                                    <form data-toggle="tooltip" data-placement="top" title="Accepte" enctype="multipart/form-data" action="{{route('aprove')}}" method="post" >
                                        @csrf
                                        <input  name="ex_id" type="hidden" value="{{$ex->id}}"/>
                                        <input name="expense_status" type="hidden" value="Aproved"/>
                                        <a  >
                                            <button  type="submit" class="btn btn-link">
                                                <i class="nc-icon nc-check-2" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </form>


                                </div>
                                @elseif( $ex->status == 'Aproved')
                                    <div  class="btn-group" role="group" aria-label="Third group">
                                        <a data-toggle="tooltip" data-placement="top" title=" Edit "  href="/expense/{{$ex ->id}}/edit" type="button" >
                                            <button type="button" class="btn btn-link"><i class="fa fa-edit"></i></button>
                                        </a>
                                    </div>
                                    @endif
                            </td>

                            <td>
                                @if($ex ->status == 'Pending')
                                    <span class="badge badge-info">
                                    {{$ex ->status}}
                                </span>
                                @elseif($ex ->status == 'Aproved')
                                    <span class="badge badge-pill badge-success ">
                                     {{$ex ->status}}
                                </span>
                                    @endif


                            </td>
                            <td>
                                &#160;	 {{$ex ->Category}}
                            </td>
                            <td>
                                @foreach($dvs as $dv )

                                    @if($ex ->deliverer_id == $dv ->id   )
                                        <span class="badge ">  {{$dv ->name}}</span>
                                    @else
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{$ex ->Cost}}
                            </td>
                            <td>
                                {{$ex ->date }}
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

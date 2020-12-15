@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
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
            font-family: 'Old Standard TT', serif


    </style>
    @include('sweetalert::alert')
    <div id="sd" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Deliverer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br/>
                <br/>
                <form enctype="multipart/form-data" action="{{route('adddv')}}" method="post">
                    @csrf
                    <div class="pl-lg-4 row">
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-name">Name</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative"    placeholder="Name" required="" autofocus="" style="direction: ltr;">
                        </div>
                        <div class="col-md-10 col-xl-5 form-group">
                            <label class="form-control-label" for="input-email">Email</label>
                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="Email"   required="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Phone</label>
                            <input type="text" name="phone" id="input-email" class="form-control form-control-alternative" placeholder="Phone"  required="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-5 form-group">
                            <label class="form-control-label" for="input-email">City</label>
                            <input type="text" name="city" id="input-email" class="form-control form-control-alternative" placeholder="City"  required="" style="direction: ltr;">
                        </div >
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Password</label>
                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative @error('password') is-invalid @enderror" placeholder="Password" value="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-12 col-xl-5 form-group">
                            <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm Password" value="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password">Gender</label>
                            <div >
                                <select name="gender" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">
                                    <option  selected="">Choose...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div  hidden class="col-md-12 col-xl-5 form-group">
                            <label  class="form-control-label" for="input-password">Type</label>
                            <div >
                                <select name="usertype" class="selectpicker form-control" value="Deliverer" tabindex="-98">
                                    <option  selected="" value="Deliverer">Deliverer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="text-center col-lg-12" >
                        <a href="/admin/users" type="button" class="btn btn-dark btn-round" data-dismiss="modal" >Close</a>
                        <button type="submit" class="btn btn-primary btn-round">Add </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="card">
        {{--         <div class="card-header">--}}
        {{--            <h4 class="card-title"> Users </h4>--}}
        {{--          </div>--}}
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Deliverers</h3>
                </div>
                <div class="col-4 text-right">
                    <button  class="btn btn-sm btn-outline-secondary "  data-toggle="modal" data-target=".bd-example-modal-lg">Add Deliverers</button>
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
                        &#160;		 &#160;
                        Action
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th >
                        phone
                    </th>
                    <th class="text-">
                        city
                    </th>
                    </thead>
                    <tbody>
                    @foreach($dvs as $dv)
                        <tr>
                            <td>
                                {{$dv ->id}}
                            </td>
                            <td>
                                <div  class="btn-group" role="group" aria-label="Third group">
                                    <a data-toggle="tooltip" data-placement="top" title=" Products managemet "  href="/deliverer/{{$dv ->id}}/products" type="button" >
                                        <button type="button" class="btn btn-link"><i class="nc-icon nc-bullet-list-67"></i></button>
                                    </a>
                                </div>
                                <div  class="btn-group" role="group" aria-label="Third group">
                                    <a data-toggle="tooltip" data-placement="top" title=" Edit "  href="http://127.0.0.1:8000/admin/users/{{$dv ->id}}/edit" type="button" >
                                        <button type="button" class="btn btn-link"><i class="fa fa-edit"></i></button>
                                    </a>
                                </div>
{{--                                <div  class="btn-group" role="group" aria-label="Third group">--}}
{{--                                    <form id="lol"action="{{route('users.destroy',['user'=>$user->id])}}" method="post" >--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <input name="user_id" type="hidden" value="{{$user->id}}"/>--}}

{{--                                        <button type="submit"  class="btn btn-link delete"><i class="fa fa-trash"></i>--}}
{{--                                        </button>--}}

{{--                                    </form>--}}


{{--                                </div>--}}
                                <div class="btn-group" role="group" aria-label="Third group">
                                    <form id="lol" action="{{route('dltdv',['dv'=>$dv->id])}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <input  type="hidden" value="{{$dv->id}}"/>

                                        <button data-toggle="tooltip" data-placement="top" title=" Delete " type="submit" class="btn btn-link lol"  ><i class="fa fa-trash"></i></button>

                                    </form>


                                </div>

                            </td>
                            <td>
                                {{$dv ->name}}
                            </td>
                            <td>
                                {{$dv ->email}}
                            </td>
                            <td>
                                {{$dv ->phone}}
                            </td>
                            <td>
                                {{$dv ->city}}
                            </td>
{{--                            <td>--}}
{{--                                <span class="badge badge-light">{{$user ->usertype}}</span>--}}
{{--                            </td>--}}
{{--                            <td >--}}
{{--                                <span class="badge badge-secondary">  {{$user ->created_at}}</span>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection


        @section('scripts')
            <script>
                {{--function confirmDelete(lol) {--}}
                {{--    swal({--}}
                {{--        title: "Are you sussre?",--}}
                {{--        text: "Delete user '{{$dv ->name}}' ",--}}
                {{--        icon: "warning",--}}
                {{--        buttons: true,--}}
                {{--        dangerMode: true,--}}
                {{--    })--}}
                {{--        .then((willDelete) => {--}}
                {{--            if (willDelete) {--}}
                {{--                $('#'+lol).submit();--}}
                {{--            }--}}
                {{--        });--}}
                {{--}--}}
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
                @if (count($errors) > 0)
                $('#sd').modal('show');
                @endif

            </script>
@endsection

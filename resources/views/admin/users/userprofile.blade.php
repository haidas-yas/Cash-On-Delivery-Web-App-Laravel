@extends('layouts.master')



@section('title')
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
            font-family: 'Old Standard TT', 'serif'


    </style>

    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="./assets/img/damir-bosnjak.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="./assets/img/mike.jpg" alt="...">
                                <h5 class="title">{{$admindetails->name}}</h5>
                            </a>
                            <p class="description">
                                {{$admindetails->name}}
                            </p>
                        </div>
                        <p class="description text-center">
                            {{$admindetails->phone}}
                        </p>
                    </div>

                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                    <h5>{{count($orders)}}<br><small>Order</small></h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5><br>
                                        <small>

                                                    <span class="badge ">   </span>

                                        </small>
                                    </h5>
                                </div>

                                <div class="col-lg-3 mr-auto">
                                    <h5><br><small>Spent</small></h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Team Members</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            @foreach($teams as $team)
                            <li>

                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>

                                    <div class="col-md-7 col-7">
                                        {{$team->name}}
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <btn  data-toggle="tooltip" data-placement="top" title="{{$team->email}}" class="btn btn-sm btn-outline-success btn-round btn-icon" ><i class="fa fa-envelope"> <a >{{$team->email}}</a></i></btn>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-user">


                        <form class="form-horizontal col-md-12 mx-auto"  action="{{route('updateprofile')}}" method="post" >
                            @csrf
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="col-md-12 col-xl-6 form-group">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input type="text" name="name" id="admin-name" class="form-control form-control-alternative"  value="{{$admindetails->name}}" required="" autofocus="" style="direction: ltr;">
                                </div>
                                <div class="col-md-12 col-xl-6 form-group">
                                    <label class="form-control-label" for="input-email" >Email</label>
                                    <input type="email" name="email" id="admin-email" class="form-control form-control-alternative" value="{{$admindetails->email}}"readonly placeholder="Email"   required="">
                                </div>
                                <div class="col-md-12 col-xl-6 form-group">
                                    <label class="form-control-label" for="input-email">Phone</label>
                                    <input onkeypress="return onlyNumberKey(event)" minlength="10" length maxlength="12" type="text" name="phone" id="admin-email" class="form-control form-control-alternative"value="{{$admindetails->phone}}" placeholder="Phone"  required="" style="direction: ltr;">
                                </div>
                                <div class="col-md-12 col-xl-6 form-group">
                                    <label class="form-control-label" for="input-email">City</label>
                                    <input type="text" name="city" id="admin-email" class="form-control form-control-alternative" value="{{$admindetails->city}}"placeholder="City"  required="" style="direction: ltr;">
                                </div>

                                <div  class="col-sm col-xl-6 form-group">
                                    <label class="form-control-label" for="input-password" >Gender</label>
                                    <div align="center">
                                        <select  name="gender" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">
                                            <option  selected="">
                                                {{$admindetails->gender}}
                                            </option>
                                            @if($admindetails->gender == 'male'){
                                            <option value="female">female</option>
                                            }@else
                                                <option value="male">male</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">Save Changes</button>
                                </div>


                        </form >
                    </div>


                <div class="card card-user">
                        <form class="form-horizontal col-md-12 mx-auto" action="{{route('updateCurrentPassword')}}" method="post" name="updatepwdform" id="updatepwdform">
                            @csrf

                                <div class="card-header">
                                    <h5 class="title">Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">Current Password</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current password" required="">
                                                <span id="chkCurrentPwd" role="alert">

                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label">New Password</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label"> Confirm Password</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Password Confirmation" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-info btn-round">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                </div>

            </div>
@endsection


@section('scripts')
    <script>
        @if(Session::has('error'))

        toastr.error("{{Session::get('error')}}")

        @endif
        @if(Session::has('success'))

        toastr.success("{{Session::get('success')}}")

        @endif
    </script>
    <script>
        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;

        }
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@endsection

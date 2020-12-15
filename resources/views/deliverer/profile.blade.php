@extends('layouts.master2')



@section('title')
@endsection






@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('assets/img/header.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{asset('assets/img/default-avatar.png')}}" alt="...">
                                <h5 class="title">{{Auth::user()->name}}</h5>
                            </a>
                            <p class="description">
                                {{Auth::user()->name}}
                            </p>
                        </div>
                        <p class="description text-center">
                            {{Auth::user()->phone}}
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
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        DJ Khaled
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        Creative Tim
                                        <br />
                                        <span class="text-success"><small>Available</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-ms-7 col-7">
                                        Flume
                                        <br />
                                        <span class="text-danger"><small>Busy</small></span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-user">


                    <form class="form-horizontal col-md-12 mx-auto"  action="{{route('updateprofiledv')}}" method="post" >
                        @csrf
                        <div class="card-header">
                            <h5 class="title">Edit Profile</h5>
                        </div>
                        <div class="pl-lg-4 row">
                            <div class="col-md-12 col-xl-6 form-group">
                                <label class="form-control-label" for="input-name">Name</label>
                                <input type="text" name="name" id="admin-name" class="form-control form-control-alternative"  value="{{Auth::user()->name}}" required="" autofocus="" style="direction: ltr;">
                            </div>
                            <div class="col-md-12 col-xl-6 form-group">
                                <label class="form-control-label" for="input-email" >Email</label>
                                <input type="email" name="email" id="admin-email" class="form-control form-control-alternative" value="{{Auth::user()->email}}"readonly placeholder="Email"   required="">
                            </div>
                            <div class="col-md-12 col-xl-6 form-group">
                                <label class="form-control-label" for="input-email">Phone</label>
                                <input onkeypress="return onlyNumberKey(event)" minlength="10" length maxlength="12" type="text" name="phone" id="admin-email" class="form-control form-control-alternative"value="{{Auth::user()->phone}}" placeholder="Phone"  required="" style="direction: ltr;">
                            </div>
                            <div class="col-md-12 col-xl-6 form-group">
                                <label class="form-control-label" for="input-email">City</label>
                                <input type="text" name="city" id="admin-email" class="form-control form-control-alternative" value="{{Auth::user()->city}}"placeholder="City"  required="" style="direction: ltr;">
                            </div>

                            <div  class="col-sm col-xl-6 form-group">
                                <label class="form-control-label" for="input-password" >Gender</label>
                                <div align="center">
                                    <select  name="gender" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">
                                        <option  selected="">
                                            {{Auth::user()->gender}}
                                        </option>
                                        @if(Auth::user()->gender == 'male'){
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
                    <form class="form-horizontal col-md-12 mx-auto" action="{{route('updateCurrentPassworddv')}}" method="post" name="updatepwdform" id="updatepwdform">
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
@endsection

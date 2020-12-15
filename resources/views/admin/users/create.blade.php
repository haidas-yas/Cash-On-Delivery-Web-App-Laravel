@extends('layouts.master')



@section('title')
@endsection


@section('content')
    <form action="{{route('users.update',['user'=>$user->id])}}" method="post" >
        @csrf
        @method('Put')
        <div class="align-content-center"   >
        <div  class="card">
            <div  class="card-body">


                    <h6 class="heading-small text-muted mb-4">Edit User information</h6>
                    <span></span>
                    <div class="pl-lg-4 row">
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-name">Name</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative"  value="{{$user->name}}" required="" autofocus="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Email</label>
                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="Email" value="{{$user->email}}"  required="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Phone</label>
                            <input type="text" name="phone" id="input-email" class="form-control form-control-alternative" placeholder="Phone" value="0000000" required="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">City</label>
                            <input type="text" name="city" id="input-email" class="form-control form-control-alternative" placeholder="City" value="rabat" required="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password">Password</label>
                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative" placeholder="Password" value="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm Password" value="">
                        </div>

                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password">Gender</label>
                            <div >
                                <select name="gender" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">
                                    <option value="1" selected="">Choose...</option>
                                    <option value="2">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center col-lg-12" >
                            <a href="/admin/users" type="button" class="btn btn-dark btn-round" >Close</a>
                            <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                        </div>
                    </div>

            </div>
        </div>
        </div>
    </form>
@endsection



@section('scripts')
@endsection

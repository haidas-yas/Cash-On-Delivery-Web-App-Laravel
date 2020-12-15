@extends('layouts.master')



@section('title')
@endsection


@section('content')
    <form action="{{route('products.update',['product'=>$product->id])}}" method="post" >
        @csrf
        @method('Put')
        <div class="align-content-center"   >
            <div  class="card">
                <div  class="card-body">
                    <h6 class="heading-small text-muted mb-4">Edit Product information</h6>
                    <span></span>
                    <div class="pl-lg-4 row">
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-name">Name</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative"  value="{{$product->name}}" required="" autofocus="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Cost per one</label>
                            <input  name="costperone" id="input-email" class="form-control form-control-alternative" placeholder="Email" value="{{$product->costperone}}"  required="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">description</label>
                            <input type="text" name="desc" id="input-email" class="form-control form-control-alternative" placeholder="Phone" value="{{$product->desc}}" required="" style="direction: ltr;">
                        </div>
                        <div class="text-center col-lg-12" >
                            <a href="/products" type="button" class="btn btn-dark btn-round" >Close</a>
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

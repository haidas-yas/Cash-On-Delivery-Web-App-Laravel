@extends('layouts.master')



@section('title')
@endsection


@section('content')

        <div class="align-content-center"   >
            <div  class="card">
                <div  class="card-body">
                    <h6 class="heading-small text-muted mb-4">Add Order</h6>
                    <span></span>
                    <form enctype="multipart/form-data" action="{{route('orders.store')}}" method="post" >
                        @csrf
                        <input  name="responsible_id"  hidden value="{{ Auth::user()->id }}">
                        <div class="pl-lg-4 row">
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-name">Deliverer</label>
                            <select name="deliverer_id" class="selectpicker form-control" title="Select Deliverer " required="" tabindex="-98">
                                @foreach($dvs as $dv)

                                    <option  value="{{$dv->id}}"  > {{$dv->name}}  </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Product</label>
                            <select name="product_id" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}"  > {{$product->name}} </option>

                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" >Quantity</label>
                            <input type="number" name="quantity"  class="form-control form-control-alternative" placeholder="Quantity"  required="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Total Price ( MAD )</label>
                            <input type="number" name="totalprice"  class="form-control form-control-alternative" placeholder="Total Price" value="" required="" style="direction: ltr;">
                        </div>
                        <hr class="w-120">
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password">Client Name</label>
                            <input type="name" name="client_name"  class="form-control form-control-alternative" placeholder="client_name" value="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password-confirmation">Client Phone</label>
                            <input type="number" name="client_phone"  class="form-control form-control-alternative" placeholder="client_phone" value="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" >Client City</label>
                            <input type="text" name="client_city"  class="form-control form-control-alternative" placeholder="client_city" value="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" >Client Address</label>
                            <input type="text" name="client_addrs"  class="form-control form-control-alternative" placeholder="ss" value="">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-password-confirmation">Notes</label>
                            <textarea type="text" name="note"  class="form-control form-control-alternative" placeholder="Confir" value=""></textarea>
                        </div>

                        <div class="text-center col-lg-12" >
                            <a href="/orders" type="button" class="btn btn-dark btn-round" >Close</a>

                            <button type="submit" class="btn btn-primary btn-round">Add</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

@endsection



@section('scripts')
@endsection

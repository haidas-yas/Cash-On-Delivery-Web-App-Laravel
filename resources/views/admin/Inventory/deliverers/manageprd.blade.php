@extends('layouts.master')



@section('title')
@endsection


@section('content')
    @include('sweetalert::alert')

    <form action="{{route('lol')}}" enctype="multipart/form-data"  method="post" >
        @csrf
        <div class="align-content-center"   >
            <div  class="card">
                <div  class="card-body">
                    <br/>
                    <h6 class="heading-small text-muted mb-4">Management Products of  {{$dv->name}}</h6>
                    <br/>
                    <span></span>
                    <div class="pl-lg-4 row">
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-name">Products</label>

                            @if(count( $products)>0)
                            <select name="product_id" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">

                                @foreach($products as $product)

                                    <option value="{{$product->id}}"  >  {{$product->name }} </option>
                            </select>
                                @endforeach




                                    @else
                                        <input required readonly type="text"  class="form-control form-control-alternative" placeholder="No Products">


                                    @endif

                            <input name="deliverer_id" type="hidden" value="{{$dv->id}}"/>
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Quantity</label>
                            @if(count( $products)>0)
                            <input type="text" name="quantity" id="input-quantity" class="form-control form-control-alternative" placeholder="Quantity" value="" required="" style="direction: ltr;">
                            @else
                                <input type="text" disabled name="quantity" id="input-quantity" class="form-control form-control-alternative" placeholder="Quantity" value="" required="" style="direction: ltr;">
                            @endif
                        </div>
                        @if(count( $products)>0)
                        <div class="text-center col-lg-12" >
                            <button type="submit" class="btn btn-primary btn-round">Save</button>
                        </div>
                        @else
                            <div class="text-center col-lg-12" >
                                <button disabled type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="align-content-center"   >
            <div  class="card">
                <div  class="card-body">
                    <br/>

                    <center>
                        <h4 class="heading-small text-muted mb-4">Deliverer Products</h4>
                    </center>
                    <br/>

                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Id
                        </th>

                        <th >
                            Product Name
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Cost per one
                        </th>
                        <th >
                            Total Cost
                        </th>
                        <th class="text-">
                            Created Date
                        </th>
                        </thead>
                        <tbody>

                        @foreach($dvproducts as $dvproduct)

                            <tr>

                                @if($dv->id == $dvproduct->deliverer_id  )

                                    <td>
                                        {{$dvproduct->product_id}}
                                    </td>
                                    <td>
                                        {{$dvproduct->product->name}}
                                    </td>
                                    <td>
                                        {{ $dvproduct->quantity   }}
                                    </td>
                                    <td>
                                        {{$dvproduct->product->costperone}} Mad
                                    </td>
                                    <td>
                                        {{ ($dvproduct->product->costperone) * ($dvproduct->quantity) }} MAD

                                    </td>
                                    <td>
                                        {{ $dvproduct->product->created_at   }}
                                    </td>

                                @endif

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection

@section('scripts')

@endsection

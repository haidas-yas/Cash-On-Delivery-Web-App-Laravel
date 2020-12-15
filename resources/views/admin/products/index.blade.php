@extends('layouts.master')



@section('title')

@endsection
@section('content')
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
                    @csrf
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="form34">name</label>
                        <input required  name="name" type="text" id="form34" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">


                        <label data-error="wrong" data-success="right" for="form29">Cost Per one</label>
                        <input required onkeypress="return onlyNumberKey(event)" minlength="1" length maxlength="12" name="costperone" type="price" id="form29" class="form-control validate">
                    </div>



                    <div class="md-form">

                        <label data-error="wrong" data-success="right" for="form8">Description</label>
                        <textarea name="desc" type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>

                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-unique">Add </button>
                </div>
                </form>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">Products</h3>
            </div>
            <div class="col-4 text-right">
                <button  href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Add Product</button>
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
                    Name
                </th>
                <th>
                    cost per one
                </th>
                <th >
                    Disc
                </th>
                <th class="text-">
                    Created Date
                </th>
                </thead>
                <tbody>
                </select>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product ->id}}
                        </td>
                        <td>

                            <div  class="btn-group" role="group" aria-label="Third group">
                                <a data-toggle="tooltip" data-placement="top" title=" Edit "  href="http://127.0.0.1:8000/products/{{$product ->id}}/edit" type="button" >
                                    <button type="button" class="btn btn-link"><i class="fa fa-edit"></i></button>
                                </a>
                            </div>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <form action="{{route('products.destroy',['product'=>$product->id])}}" id="lol"  method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <input  type="hidden" value="{{$product->id}}" />

                                    <button type="submit" data-toggle="tooltip" data-placement="top" title=" Delete " class="btn btn-link lol"  ><i class="fa fa-trash"></i></button>

                                </form>
                            </div>

                        </td>

                        <td>
                            {{$product ->name}}
                        </td>
                        <td>
                            &#160;	 {{$product ->costperone}} MAD
                        </td>
                        <td>
                            <small>
                                {{$product ->desc}}
                            </small>

                        </td>
                        <td>
                            {{$product ->created_at}}
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
            function onlyNumberKey(evt) {

                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }


        </script>
@endsection

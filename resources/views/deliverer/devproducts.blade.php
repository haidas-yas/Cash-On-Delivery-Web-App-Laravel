@extends('layouts.master2')



@section('title')
@endsection






@section('content')
    <div class="align-content-center"   >
        <div  class="card">

            <div  class="card-body">
                <center>
                    <h4 class="heading-small text-muted mb-4">My Products</h4>
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


                    <th class="text-right">
                        Created Date
                    </th>
                    </thead>
                    <tbody>
                    @foreach($dvproducts as $dvproduct)

                        <tr>



                                <td>
                                    {{$dvproduct->product_id}}
                                </td>
                                <td>
                                    {{$dvproduct->product->name}}
                                </td>
                                <td>
                                    {{ $dvproduct->quantity   }}
                                </td>

                                <td class="text-right">
                                    {{ $dvproduct->created_at   }}
                                </td>



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

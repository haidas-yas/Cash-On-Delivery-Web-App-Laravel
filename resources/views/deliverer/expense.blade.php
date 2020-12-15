@extends('layouts.master2')



@section('title')
    Dashboard
@endsection






@section('content')
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Expenses</h3>
                </div>
                <div class="col-4 text-right">
                    <a  href="/create-expense" class="btn btn-default btn-rounded mb-4" >Add Expense</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table">
                    <thead class=" text-primary">

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
                                @if( $ex->status == 'Pending')

                                <div  class="btn-group" role="group" aria-label="Third group">
                                    <a data-toggle="tooltip" data-placement="top" title=" Edit "  href="/edit-expense/{{$ex ->id}}" type="button" >
                                        <button type="button" class="btn btn-link"><i class="fa fa-edit"></i></button>
                                    </a>
                                </div>
                                @elseif( $ex->status == 'Aproved')
                                    <div>-</div>
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


@endsection

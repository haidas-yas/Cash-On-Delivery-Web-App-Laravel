@extends('layouts.master')



@section('title')
@endsection


@section('content')

    <div class="align-content-center"   >
        <div  class="card">
            <div  class="card-body">
                <h6 class="heading-small text-muted mb-4">Edit Expense</h6>
                <span></span>
                <form enctype="multipart/form-data" action="{{route('expense.update',['expense'=>$expense->id])}}" method="post" >
                    @csrf
                    @method('Put')
                    <div class="pl-lg-4 row">

                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" >Category</label>
                            <input type="text" name="Category"  class="form-control form-control-alternative" value="{{$expense->Category}}" placeholder="Category"  required="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-email">Cost ( MAD )</label>
                            <input type="number" name="Cost"  class="form-control form-control-alternative" placeholder="Cost" value="{{$expense->Cost}}" required="" style="direction: ltr;">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label >Date</label>
                            <input value="{{$expense->date}}" type="date" name="date" max="3000-12-31"
                                   min="1000-01-01" class="form-control">
                        </div>
                        <div class="col-md-12 col-xl-6 form-group">
                            <label class="form-control-label" for="input-name">Deliverer</label>
                            <select name="deliverer_id" class="selectpicker form-control" title="Choose ..." required="" tabindex="-98">
                                @foreach($dvs as $dv)
                                    <option value="{{$dv->id}}"  > {{$dv->name}} </option>

                                @endforeach

                            </select>
                        </div>



                        <div class="text-center col-lg-12" >
                            <a href="/expense" type="button" class="btn btn-dark btn-round" >Close</a>

                            <button type="submit" class="btn btn-primary btn-round">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </center>
@endsection



@section('scripts')
    <script >
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-1d'
        });
    </script>
@endsection

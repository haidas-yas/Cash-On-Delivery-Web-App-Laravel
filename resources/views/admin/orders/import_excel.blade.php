


@extends('layouts.master')



@section('title')
    Dashboard
@endsection






@section('content')

    <div class="card card-user">

        <form class="form-horizontal col-md-12 mx-auto" action="{{ url('import') }}" method="POST" name="importform" enctype="multipart/form-data">
            @csrf

            <div class="card-header text-center">
                <h5 class="title">Import Order</h5>
            </div>
            <br/>
            @if ((count($errors)))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <div class="card-body">



                <div class="col-md-12">
                    <label for="input-cost" class="form-control-label"><h6>
                            Choose file
                        </h6>
                     </label>
                    <div class="custom-file">
                        <input type="file" name="file" id="photo-input-file" required="required" class="custom-file-input">
                        <label for="photo-input-file" class="custom-file-label">
                            Choose file
                        </label>
                    </div>
                    <small class="text-info">ORDER INFORMATION (THE REQUIRED FILE EXTENSION IS XLSX,CSV,TSV,ODS,XLS)</small>

                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark btn-round">Import</button>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </form>
    </div>
@endsection



@section('scripts')

    <script>
        @if(Session::has('success'))

        toastr.success("{{Session::get('success')}}")

        @endif
    </script>

@endsection

@extends('layouts.admin')

@section('title')
    Register edit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Edit Ville</h3></center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <center>
                                    <form action="{{ url('update/ ' . $ville->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label" >Name</label>
                                                <input type="text" name="name" value="{{$ville->name}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label" >Content</label>
                                                <input type="text" name="content" value="{{$ville->content}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Image:</label>
                                                <input type="file" name="image" class="form-control" method="post" enctype="multipart/form-data"  placeholder="image">
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('villes')  }}" class="btn btn-secondary">Back</a>
                                                <button type="submit" class="btn btn-primary">Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection

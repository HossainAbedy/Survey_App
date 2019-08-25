@extends('layouts.master')

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Click Export to download files
            <a class="btn btn-info float-right" href="{{ url('/home#/formlist') }}"> View Lists</a>
        </div>
        <div class="card-body">
            <form action="{{ url('import') }}" method="POST" name="importform"
               enctype="multipart/form-data">
                {{ csrf_token() }}
                <input type="file" name="file" class="form-control">
                <br>
                <a class="btn btn-info float-right" href="{{ url('export') }}">
                 Export File</a>
                <button class="btn btn-success float-right">Import File</button>
            </form>
        </div>
        <div class="jumbotron text-center">
            <div class="card-body">
                <h4>Send Files to admin</h4>
                <form method="post" action="{{url('upload')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="document">Document:</label>
                            <input type="file" class="form-control" name="document">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-danger float-right">Google <i class="fab fa-google-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

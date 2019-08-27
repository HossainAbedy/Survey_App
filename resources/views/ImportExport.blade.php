<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Survey App</title>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">.
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    Click Export to download files
                    <a class="btn btn-success float-right" href="{{ url('/home#/formlist') }}"> View Lists</a>
                </div>
                {{-- <div class="card-body">
                    <form action="{{ url('import') }}" method="POST" name="importform"
                    enctype="multipart/form-data">
                        {{ csrf_token() }}
                        <input type="file" name="file" class="form-control">
                        <br>
                        <a class="btn btn-info float-right" href="{{ url('export') }}">
                        Export File</a>
                        <button class="btn btn-success float-right">Import File</button>
                    </form>
                </div> --}}
                <div class="jumbotron text-center">
                    <div class="card-body">
                        <h4>Send Files to admin</h4>
                            @if(Session::has('message-gmail'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message-gmail') }}</p>
                            @endif
                            @if(Session::has('message-download'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message-download') }}</p>
                            @endif
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
                                <div class="form-group col-md-2">
                                    <a class="btn btn-info float-left" href="{{ url('export') }}">Download<i class="fas fa-download"></i></a>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-danger float-right">Google<i class="fab fa-google-plus"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

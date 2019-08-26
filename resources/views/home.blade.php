@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <p>You are logged in as : </p><p style="color:red">{{Auth::user()->user_type}}!!</p>
                    </div>
                    <div class="container-fluid">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

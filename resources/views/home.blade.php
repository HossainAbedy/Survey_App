@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home</div>
<<<<<<< HEAD
=======

>>>>>>> d94cdeb3caecdac6821722ccb93897d1797cfecc
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<<<<<<< HEAD
                    <div class="row justify-content-center">
                    <p>You are logged in as</p>
                        @if(Auth::user()->user_type == 'admin')
                            <p class="admin">{{Str::upper(Auth::user()->user_type)}}</p>
                        @elseif(Auth::user()->user_type == 'surveyor')
                            <p class="surveyor">{{Str::upper(Auth::user()->user_type)}}</p>
                        @elseif(Auth::user()->user_type == 'user')
                            <p class="user">{{Str::upper(Auth::user()->user_type)}}</p>
                        @endif
                    </div>
                    <div class="container-fluid">
                        <router-view></router-view>
                        <vue-progress-bar></vue-progress-bar>
=======
                    <div class="row">
                        <p>You are logged in as : </p><p style="color:red">{{Auth::user()->user_type}}!!</p>
                    </div>
                    <div class="container-fluid">
                        <router-view></router-view>
>>>>>>> d94cdeb3caecdac6821722ccb93897d1797cfecc
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

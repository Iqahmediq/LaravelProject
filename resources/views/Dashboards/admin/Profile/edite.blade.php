@extends('Dashboards.admin.layouts.app')
@section('content')
<br>
<br>
<center>
    <h1>Edit Profile</h1>
</center>
<br>
<br>
@if ( Session::get('success'))
<div class="alert alert-success ">
    {{ Session::get('success') }}
</div>
@endif
@if ( Session::get('fail'))
<div class="alert alert-danger">
    {{ Session::get('fail') }}
</div>
@endif
<div class="col-xl-8 col-md-12" style="margin-left: 220px">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">Update Profile</h4>
            </div>
            <div class="card-body">
                <form class="form">
                    @csrf
                    <div class="form-body">
                        <div class="form-group" style="display: flex;">
                            <label for="name" class="sr-only"></label>
                            <div id="name" class="form-control" name="name" >{{Auth::user()->name}}</div>
                            <a class="btn btn-outline-primary" href="{{route('admin.ProfileName')}}" class=""> change</a>
                        </div>
                        <div class="form-group" style="display: flex;">
                            <label for="email" class="sr-only"></label>
                            <div id="email" class="form-control" name="email" >{{Auth::user()->email}}</div>
                            <a class="btn btn-outline-primary" href="{{route('admin.ProfileEmail')}}" class=""> change</a>
                        </div>
                        <div class="form-group" style="display: flex;">
                            <label for="password" class="sr-only">Password</label>
                            <div id="password" class="form-control" name="password" >*********</div>
                            <a class="btn btn-outline-primary" href="{{route('admin.ProfilePassword')}}" class=""> change</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
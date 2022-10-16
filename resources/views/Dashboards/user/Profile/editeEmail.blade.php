@extends('Dashboards.user.layouts.app')
@section('content')
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
<br>
<br>
<div class="content-body">


    <!-- Basic Inputs start -->
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-8 col-lg-12 col-md-12" style="margin-left: 200px">
                <h1>Email : {{Auth::user()->email}}</h1>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Email</h4>
                    </div>
                    <div class="card-block">
                        <form action="{{route('user.ChangeProfileEmail')}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <fieldset class="form-group">
                                    <input type="text" required
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="Nouveau email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <br>
                                    <input type="password" required
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        name="password" placeholder="password">
                                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <br>
                                <button type="submit" class="btn btn-light btn-min-width mr-1 mb-1">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
@extends('Dashboards.user.layouts.app')
@section('content')
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
<br>
<div class="content-body">


    <!-- Basic Inputs start -->
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-8 col-lg-12 col-md-12" style="margin-left: 200px">
                <h1>Name : {{Auth::user()->name}}</h1>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Name</h4>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('user.ChangeProfileName')}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <fieldset class="form-group">
                                    <input type="text" required
                                        class="form-control" id="name"
                                        name="name" placeholder="Nouveau Nom">
                                </fieldset>
                                <br>
                                <button type="submit" class="btn btn-light btn-min-width mr-1 mb-1">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
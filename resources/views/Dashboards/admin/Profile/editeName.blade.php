@extends('Dashboards.admin.layouts.app')
@section('content')
@section('search')
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
<li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
    data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
<ul class="dropdown-menu">
    <li class="arrow_box">
        <form action="{{route('admin.searchCategory')}}">
            <div class="input-group search-box">
                <div class="position-relative has-icon-right full-width">
                    <input aria-label="search" aria-describedby="search" class="form-control" type="text" name="query" value="{{ request()->input('query') }}"
                        placeholder="Search here...">
                    <div class="form-control-position navbar-search-close"><button style="border:none; outline:none; background-color: #ffffff;" type="submit"><i class="ft-x">
                </i></button></div>
                </div>
            </div>
        </form>
    </li>
</ul>
</li>
@endsection
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
                        <form action="{{ route('admin.ChangeProfileName')}}" method="POST">
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
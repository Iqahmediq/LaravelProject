@extends('Dashboards.admin.layouts.app')
@section('content')
@section('search')
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
                <h1>Add Category</h1>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Title Category</h4>
                    </div>
                    <div class="card-block">
                        <form action="{{route('admin.storeCategory')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <fieldset class="form-group">
                                    <input type="text" required
                                        class="form-control @error('titre') is-invalid @enderror" id="titre"
                                        name="titre" placeholder="Title Category">
                                    @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <br>
                                <button type="submit" class="btn btn-light btn-min-width mr-1 mb-1">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Table head options start -->
            <div class="row" style="margin:50px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">LIST CATEGORIES</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <p>Similar to default and inverse tables, use one of two modifier classes <code
                                        class="highlighter-rouge">.thead-default</code> or <code
                                        class="highlighter-rouge">.thead-inverse</code> to make <code
                                        class="highlighter-rouge">&lt;thead&gt;</code>s appear light or dark gray.</p>
                            </div>
                            <div class="table-responsive" style="height:400px; overflow:scroll;">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">TITLE</th>
                                            <th scope="col">CREATED AT :</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{$category->id}}</th>
                                            <td>{{$category->titre}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td>
                                                <div class="col-md-4 col-sm-6 col-12 fonticon-container"
                                                    style="display: flex; height:70px; margin-top: -15px">
                                                    <form method="POST"
                                                        action="{{ route('admin.DeleteCategory' ,['id'=>$category->id]) }}"
                                                        onsubmit="return confirm('are you sure to delete category')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button title="Supprimer"
                                                            class="btn btn-icon btn-icon-only btn-link btn-sm p-1"
                                                            type="submit">
                                                            <div class="col-md-4 col-sm-6 col-12 fonticon-container">
                                                                <div
                                                                    class="fonticon-wrap icon-shadow icon-shadow-primary">
                                                                    <i class="la la-trash-o"></i></div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                    <div class="col-md-4 col-sm-6 col-12 fonticon-container"
                                                        style="margin-top: 14px; margin-left:-15px;">
                                                        <a href="{{ route('admin.editCategory' ,['id'=>$category->id])}}"><div class="fonticon-wrap icon-shadow icon-shadow-primary"><i
                                                                class="la la-pencil-square-o"></i></div></a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end -->

            
        </section>
    </div>
    @endsection
    
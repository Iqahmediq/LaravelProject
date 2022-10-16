@extends('Dashboards.admin.layouts.app')
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
<div class="content-body">

<center>
    <h1>List Product</h1>
</center>
<br>
<br>
<div class="row" style="margin:50px;">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">LIST PRODUCTS</h4>
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
                <div class="table-responsive" style="height: 400px; overflow:scroll;" >
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">REFERENCE</th>
                                <th scope="col">NAME</th>
                                <th scope="col">PRIX</th>
                                <th scope="col">QTE</th>
                                <th scope="col">IMAGES</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->reference}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->prix}}</td>
                                <td>{{$product->Qte}}</td>
                                <td>
                                    <img style="height: 30px; width:30px;" src="{{asset('ahmed1/' . $product->image)}}" alt=""></td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <div class="col-md-4 col-sm-6 col-6 fonticon-container"
                                        style="display: flex; height:70px; margin-top: -15px ;margin-left:-55px;">
                                        <form method="POST"
                                            action="{{ route('admin.DeleteProduct' ,['id'=>$product->id]) }}"
                                            onsubmit="return confirm('are you sure to delete product')">
                                            @method('DELETE')
                                            @csrf
                                            <button title="Supprimer"
                                                class="btn btn-icon btn-icon-only btn-link btn-sm p-1"
                                                type="submit">
                                                <div class="col-md-4 col-sm-6 col-6 fonticon-container">
                                                    <div
                                                        class="fonticon-wrap icon-shadow icon-shadow-primary">
                                                        <i class="la la-trash-o"></i></div>
                                                </div>
                                            </button>
                                        </form>
                                        <div class="col-md-4 col-sm-6 col-6 fonticon-container"
                                            style="margin-top: 14px; margin-left:-55px;">
                                            <a href="{{ route('admin.editProduct' ,['id'=>$product->id]) }}"><div class="fonticon-wrap icon-shadow icon-shadow-primary"><i
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

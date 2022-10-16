@extends('Dashboards.admin.layouts.app')
@section('content')
<br>
<br>
<center>
    <h1>Add Product</h1>
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
                <h4 class="card-title">Update Product</h4>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('admin.updateProduct' ,['id'=>$product->id])}}"  method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label for="reference" class="sr-only">Reference</label>
                            <input type="text" id="reference" class="form-control"
                             name="reference" value="{{$product->reference}}" >
                        </div>
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" id="name" class="form-control"
                            value="{{$product->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="Qte" class="sr-only">Qte</label>
                            <input type="text" id="Qte" class="form-control"
                            value="{{$product->Qte}}" name="Qte">
                        </div>

                        <div class="form-group">
                            <label for="prix" class="sr-only">Prix</label>
                            <input type="text" id="prix" class="form-control"
                            value="{{$product->prix}}" name="prix">
                        </div>
                        
                        <div class="form-group">
                            <label for="image" class="sr-only">image</label>
                            <input type="file" id="image" class="form-control"
                                placeholder="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="category" class="sr-only" >Category</label>
                            <select class="form-control" aria-label="Default select example" name="category" id="category">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->titre}}">{{$category->titre}}</option>
                                @endforeach
                              </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="description" class="sr-only">description</label>
                            <input type="text" id="description" rows="5" class="form-control square"
                                name="description" value="{{$product->description}}">
                        </div>

                    </div>
                    <div class="form-actions center">
                        <button type="submit" class="btn btn-outline-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

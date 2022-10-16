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
<center>
    <h1 > Category : {{$category->titre}}</h1>
</center>

<section id="card-headings">
	<div class="row">
		<div class="col-12 mt-3 mb-1">
			<h4 class="text-uppercase">Card Headings</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="card text-center">
				<div class="card-header">
					#ID: : {{$category->id}}
				</div>
				<div class="card-body">
					<h5 class="card-title">#TITLE : {{$category->titre}}</h5>
					<p class="card-text">#Created_at : {{$category->created_at}}</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="heading-multiple-thumbnails">Multiple Thumbnail</h4>
					
				</div>
				<div class="card-content">
					
                        <form method="POST" action="{{ route('admin.UpdateCategory' ,['id'=>$category->id])}}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <fieldset class="form-group">
                                    <input type="text" required
                                        class="form-control" id="titre"
                                        name="titre"  value="{{$category->titre}}">
                                </fieldset>
                                <br>
                                <button type="submit" class="btn btn-light btn-min-width mr-1 mb-1">UPDATE</button>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		
	</div>

</section>
@endsection

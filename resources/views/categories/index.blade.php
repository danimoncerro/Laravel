@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Categorii </h1>

				<table class="table table-bordered">
					<tr>
						<th>Id categorie</th>
						<th>Title</th>
					</tr>

					@foreach($categories as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->title}}</td>
						</tr>
					@endforeach
				</table>
		</div>
	</div>
	</div>

@endsection
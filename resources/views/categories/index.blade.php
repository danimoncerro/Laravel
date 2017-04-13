@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Categorii </h1>

				<p>
					<a href="/categories/create" class="btn btn-success">
						Adauga
					</a>
				</p>

				<table class="table table-bordered">
					<tr>
						<th>Id categorie</th>
						<th>Title</th>
						<th>Actions</th>
					</tr>

					@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->title }}</td>
							<td>
								<a href="/categories/{{ $category->id }}/edit" class="btn btn-primary">
									Editeaza
								</a>
								<a href="/categories/{{ $category->id }}/delete" class="btn btn-danger">
									Sterge
								</a>
							</td>
						</tr>
					@endforeach
				</table>
		</div>
	</div>
	</div>

@endsection
@extends('layouts.app')

@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="/categories/save" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $category->id }}">
				<p>
					<label> Nume categorie: </label>
					<input type="text" name="title" value="{{ $category->title }}">
				</p>
				<input type="submit" name="submit" value="salveaza">
			</form>
		</div>
	</div>
	</div>

@endsection
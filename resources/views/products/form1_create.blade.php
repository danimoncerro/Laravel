@extends('layouts.app')

@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="/products/save-product" method="get">
				{{ csrf_field() }}
				<p>
					<label> Nume categorie: </label>
					<input type="text" name="title" placeholder="Introduceti numele categoriei">
				</p>
				<input type="submit" name="submit" value="Adauga categorie">
			</form>
		</div>
	</div>
	</div>

@endsection
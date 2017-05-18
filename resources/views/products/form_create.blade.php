@extends('layouts.app')

@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="/products/create" method="post">
				{{ csrf_field() }}
				<p>
					<label> Nume produs: </label>
					<input type="text" name="title" placeholder="Introduceti numele produsului">
					<br><br>
					<label> Stocul: </label>
					<input type="text" name="stock">
					<label>Pret:</label>
					<input type="text" name="price">
					<label>Categoria</label>
					<input type="text" name="category_id">
				</p>
				<br><br>
				<input type="submit" name="submit" value="Adauga produsul">
			</form>
		</div>
	</div>
	</div>

@endsection


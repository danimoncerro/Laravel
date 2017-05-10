@extends('layouts.app')

@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="/products/save" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $product->id }}">
				<p>
					<label> Nume produs: </label>
					<input type="text" name="title" value="{{ $product->title }}">
					<br><br>
					<label> Stocul: </label>
					<input type="text" name="stock" value="{{ $product->stock }}">
					<label>Pret:</label>
					<input type="text" name="price" value="{{ $product->price }}">
					<label>Categoria</label>
					<input type="text" name="category_id" value="{{ $product->stock }}">
				</p>
				<br><br>
				<input type="submit" name="submit" value="Salveaza modificarile">
			</form>
		</div>
	</div>
	</div>

@endsection


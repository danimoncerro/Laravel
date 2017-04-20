@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Produse </h1>

				<table class="table table-bordered">
					<tr>
						<th>Id produs</th>
						<th>Title</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Category</th>
					</tr>

					@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td>{{$product->title}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->stock}}</td>
							<td>
								@if(isset($product->category))
									{{$product->category->title}}
								@else
									Nu exista aceasta categorie
								@endif
							</td>
						</tr>
					@endforeach
				</table>
		</div>
	</div>
	</div>


@endsection


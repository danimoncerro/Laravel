@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Produse </h1>

				<p>
					<a href="/products/add-product" class="btn btn-success">
						Adauga
					</a>
				</p>

				<table class="table table-bordered">
					<tr>
						<th>Id produs</th>
						<th>Title</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Category</th>
						<th>Add to box</th>
						<th>Actions</th>
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
							<td>
								@include('products.add_to_cart', [
									'productId' => $product->id, 
									'q' => 1
								])
							</td>
							<td>
								<a href="/products/{{ $product->id }}/edit" class="btn btn-primary">
									Editeaza
								</a>
								<a href="/products/{{ $product->id }}/delete" class="btn btn-danger">
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


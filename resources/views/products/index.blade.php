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
								
                  					                           
             				<?php /*	<a href="/products/add-to-cart/{{$product->id}}/1">Adauga in cos</a> 
							*/?>
             					<form action="/products/add-to-cart/{{$product->id}}/1" method="GET">
                  					<input type="hidden" value="<?php echo $product->id ?>" name="id">
                  					<input type="number" name="cantitate" min="1" max="500" value="1">
                					<input type="submit" value="Adauga in cos">
                				</form>


							</td>
						</tr>
					@endforeach
				</table>
		</div>
	</div>
	</div>


@endsection


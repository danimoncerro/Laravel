@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Cosul meu</h1>
				<table class="table table-bordered">
					
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Subtotal</th>
					<th>Actions</th>
				</tr>


				@foreach($cart as $item)
					<tr>
						<td>{{ $item['product_id'] }}</td>
						<td>{{ $item['title'] }}</td>
						<td>{{ $item['q'] }}</td>
						<td>{{ $item['price'] }}</td>
						<td>{{ $item['price'] * $item['q']}}</td>
						<td>
							<a href="/products/cart/{{ $item['product_id'] }}/delete">Sterge</a>
						<td>
					</tr>
				@endforeach

				</table>
		</div>
	</div>
	</div>




@endsection
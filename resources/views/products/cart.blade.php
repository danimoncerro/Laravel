@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Cosul meu</h1>

			@if (count($cart)==0)
				<h2>Cosul este gol</h2>
			@else
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
						<td>
						@include('products.add_to_cart', ['productId' => $item['product_id'], 'q' => $item['q'] ])
						</td>
						<td>{{ $item['price'] }}</td>
						<td>{{ $item['price'] * $item['q']}}</td>
						<td>
							<a href="/products/cart/{{ $item['product_id'] }}/delete">Sterge</a>
						</td>
					</tr>
					
				@endforeach

				</table>
				<a href="/products/empty-cart" class="btn btn-success">Goleste cos</a>
				<br><br>
				
				<form action="/orders/create/{{ $cartTotal }}"  method="post">
				{{ csrf_field() }}
				<?php //<input type="hidden" name="id" value="{{ $cartTotal }}"> ?>
				
				<input type="submit" name="submit" class="btn btn-success" value="Trimite comanda">
			</form>
				

				<br><br>
				<h1>Valoarea totala a cosului este: {{ $cartTotal }} lei (fara tva)</h1>
				<h1>Valoarea totala a cosului este: {{ $cartTotal*1.19 }} lei (cu tva)</h1>
			@endif
		</div>
	</div>
</div>
@endsection

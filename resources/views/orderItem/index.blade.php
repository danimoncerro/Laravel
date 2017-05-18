@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Detalii comanda </h1>

				<table class="table table-bordered">
					<tr>
						<th>Order ID</th>
						<th>Title</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Value</th>
						<th>Date</th>
					</tr>
					<?php $total = 0;  ?>
					@foreach($orderItem as $order)
						<tr>
							<td>{{$order->order_id}}</td>
							<td>{{$order->product_id}}</td>
							<td>{{$order->quantity}}</td>
							<td>{{$order->price}}</td>
							<td>{{$order->subtotal}}</td>
							<td>{{$order->created_at}}</td>
						</tr>
						<?php $total = $total + $order->subtotal; ?>
					@endforeach
				</table>
				<p>Valoarea totala a comenzii este: {{ $total }}</p>
		</div>
	</div>
	</div>


@endsection
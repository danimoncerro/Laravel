@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Detalii comanda (#{{ $order->id }}) </h1>
				<h3> Status comanda: {{ $order->status }} </h3>

				<div class="client">
				<p>
				  Nume client: {{ $order->user->name}}
				</p>

				</div>

				<table class="table table-bordered">
					<tr>
						<th>Nr crt.</th>
						<th>Title</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Value</th>
						<th>Date</th>
					</tr>

					@foreach($order->orderItems as $k => $item)
						<tr>
							<td>{{ ($k+1) }}</td>
							<td>{{$item->product->title}}</td>
							<td>{{$item->quantity}}</td>
							<td>{{$item->price}}</td>
							<td>{{$item->subtotal}}</td>
							<td>{{$item->created_at}}</td>
						</tr>
					@endforeach
				</table>
				<p>Valoarea totala a comenzii este: {{ $order->total_price }}</p>
		</div>
	</div>
	</div>


@endsection

@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
		<div class="col-md-12">

				<h1> Istoric comenzi </h1>

				<table class="table table-bordered">
					<tr>
						<th>Id</th>
						<th>Utilizator</th>
						<th>Valoare</th>
						<th>Nr Items</th>
						<th>Data</th>
						<th>Status</th>
						<th>Actions</th>

					</tr>

					@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{$order->user->name}}</td>
							<td>{{$order->total_price}}</td>
							<td>{{$order->orderItems->count()  }}</td>
							<td>{{$order->created_at}}</td>
							<td>{{$order->status}}</td>
							<td>
								<a href="/orders/{{ $order->id }}/view" class="btn btn-primary">
									Vizualizeaza comanda
								</a>
							</td>
						</tr>
					@endforeach
				</table>
		</div>
	</div>
	</div>


@endsection
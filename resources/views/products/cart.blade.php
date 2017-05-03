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
						<td>
							<form action="/products/add-to-cart/{{$item['product_id']}}/1" method="GET">
                  					
                  					<input type="number" name="cantitate" min="1" max="500" value="{{$item['q']}}">
                					<input type="submit" value="Actualizeaza cos">
               				</form>

						</td>
						<td>{{ $item['price'] }}</td>
						<td>{{ $item['price'] * $item['q']}}</td>
						<td>
							<a href="/products/cart/{{ $item['product_id'] }}/delete">Sterge</a>
						</td>
					</tr>
					
				@endforeach
				

				</table>

				<?php 
					if($cart==null)
						echo "<br>"."Cosul este gol!";
				 ?>
				<br><br>
				<h1>Valoarea totala a cosului este:
					<?php $total = 0;
    					  foreach($cart as $item)
    					  {
					
						   	$total+= $item['price'] * $item['q'];
					      }
						  echo $total." lei" ?>

				</h1>


				
		</div>
	</div>
	</div>




@endsection

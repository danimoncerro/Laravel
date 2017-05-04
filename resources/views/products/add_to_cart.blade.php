<form action="/products/add-to-cart/{{ $productId }}" method="POST">
	{{ csrf_field() }}
	<input type="number" name="cantitate" min="1" max="500" value="{{ $q }}">
	<input type="submit" class="btn btn-success" value="Adauga in cos">
</form>
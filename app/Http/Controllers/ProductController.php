<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('products.index', compact('products'));
    }

    /**
     * Adauga un cos 
     **/
    public function addToCart(Request $request, $id)
    {

    	// Citeste din: input, cookie, session, route, etc//
    	// $all = $request->all();

    	$q = $request->get('cantitate');

    	// Citim produsul
    	$product = Product::find($id);

    	// Citim cartul actual  din sesiune
    	$cart = $request->session()->get('cart');

    	// Construim cosul
    	// Adaugam in cos
    	$cart[$id] = [
			'product_id' => $id,
			'title' => $product->title,
			'q' => $q,
			'price' => $product->price,
    	];

    	// Scriere in sesiune
    	$request->session()->put('cart', $cart);

    	// Citirea valorilor
    	// $values = [
    	// 	$request->session()->get('product_id'),
    	// 	$request->session()->get('q'),
    	// ];

    	// Citirea tuturor valorilor
    	// $values = $request->session()->all();

    	// redirectam catre cosul meu
    	return redirect('/products/cart');

    }

    public function cart(Request $request)
    {
    	$cart = $request->session()->get('cart', []);
    	$cartTotal = $this->totalCart($cart);

    	return view('products.cart', compact('cart', 'cartTotal'));
    }

    public function deleteFromCart(Request $request, $id)
    {
    	/**
    	Citim cartul din sesiune 
    	**/
    	$cart = $request->session()->get('cart'); // $cart = $_SESSION['cart']
    	if(isset($cart[$id])){
    		unset($cart[$id]);
    	}

    	//salvam cartul in sesiune

    	$request->session()->put('cart', $cart);

    	return redirect('/products/cart');
    }

    protected function totalCart($cart)
    {
    	$total = 0;
    	foreach($cart as $item)
    	{
			$total+= $item['price'] * $item['q'];
		}

		return $total;
    }

    public function emptyCart(Request $request)
    {
    	// $request->session()->put('cart', []);
    	$request->session()->forget('cart'); // sterge complet $_SESSION['cart']
    	return redirect('products/cart');
    }
}

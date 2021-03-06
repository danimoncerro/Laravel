<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // use {namespace}/{classname}

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
        // Demo cu utilizatorul autentificat
        // $user = Auth::user();
        // dump($user->name);
        // dd($user);
        // Check if user is logged in
        // $isLoggedIn = Auth::check();
        // dump($isLoggedIn);


        // Read logged in user id 
        // $userId = Auth::id();
        // dd($userId);


        // END Demo 


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

    public function create(Request $request) 
    {
     
        $product = Product::create([
            'title' => $request->title,
            'stock' => $request->stock,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect('/products/');

        // $event = new Event();
        // $event->title = 'Titlu test';
        // $event->location = 'Baia mare';
        // $event->seat = 40;

        // $event->save();

        //echo 'Event saved';
        
    }

    public function addProduct()
    {
        return view('products.form_create');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.form_edit', compact('product'));
    }

    public function save(Request $request)
    {
        $product = Product::find($request->id);
     
        $product->title = $request->title;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->category_id = $request->category_id;


        $product->save();

        // redirect catre listare categorii
        return redirect('/products');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        // redirect catre listare categorii
        return redirect('/products');
    }
}

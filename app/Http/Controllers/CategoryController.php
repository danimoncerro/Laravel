<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();

    	return view('categories.index', compact('categories'));
    }

    public function edit($id)
    {
    	// SELECT * FROM categories WHERE id = $id 
    	//$category = Category::where('id', $id)->get(); // $categories[0]
    	$category = Category::find($id);

    	return view('categories.form_edit', compact('category'));
    }

    public function delete($id)
    {
    	$category = Category::find($id);
    	$category->delete();

    	// redirect catre listare categorii
    	return redirect('/categories');
    }

    public function save(Request $request)
    {
    	if ($request->id == null) {
    		// Am venit din formularul de adaugare
    		$category = new Category;
    	} else {
    		// Am venit din formularul de editare 
    		// Cautam categoria cu idul selectat
	    	$category = Category::find($request->id);
    	}

    	// if ($request->id) {
	    // 	$category = Category::find($request->id);
    	// } else {
    	// 	$category = new Category;
    	// }

    	$category->title = $request->title;

    	$category->save();

    	// redirect catre listare categorii
    	return redirect('/categories');
    }

    public function create() 
    {
    	return view('categories.form_create');
    }
}

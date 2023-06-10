<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('crud_products.index', compact('products', 'categories'));
    }

    public function DeleteProduct($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produit est supprimée avec succèss');  
    }

    public function ShowCreate(){
        $categories = Category::all();
        return view('crud_products.create', compact('categories'));
    }

    public function ShowEdit($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('crud_products.edit', compact('product', 'categories'));
    }

    public function View($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('crud_products.view', compact('product', 'categories'));
    }

    public function Create(Request $request){

        $request->validate([
           'name_product' => 'required|string|max:255',
           'details_product' => 'required|string|max:255',
           
           'category_id' => 'required', //name of selected menus
        ],[
            'name_product.required' => 'name_product is required',
            'name_product.string' => 'name_product is string',
            'name_product.max' => 'name_product has a 255 max of caracters',

            'details_product.required' => 'details_product is required',
            'details_product.string' => 'details_product is string',
            'details_product.max' => 'details_product has a 255 max of caracters',
        ]);

        $product = new Product();
        
        $product->name_product = $request->name_product;
        $product->details_product = $request->details_product;

        $product->category_id = $request->category_id; //name of selected menus

        if($product->save()){
            return redirect()->route('index')->with('success', 'Produit est ajoutée avec succèss.');
        }else{ 
            return redirect()->back()->with('erreurs', 'Produit non enregistrée');
        }
        
        
    }

    
    public function edit(Request $request, $id){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'details_product' => 'required|string|max:255',
            //pas de category_id que create
        ], [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name should not exceed 255 characters',
            'details_product.required' => 'Details are required',
            'details_product.string' => 'Details must be a string',
            'details_product.max' => 'Details should not exceed 255 characters',
        ]);

        $product = Product::find($id);

        $product->name_product = $request->name;
        $product->details_product = $request->details_product;

        $product->category_id = $request->category_id;

        
        if ($product->save()) {
            return redirect()->route('index')->with('success', 'Product updated successfully');
        } else {
            return redirect()->back()->with('errors', 'Failed to update product');
        }
        
    }


    
}
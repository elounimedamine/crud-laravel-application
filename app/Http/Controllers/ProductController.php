<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('crud.index', compact('products'));
    }

    public function DeleteProduct($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produit est supprimée avec succèss');
        
    }

    public function ShowCreate(){
        return view('crud.create');
    }

    public function ShowEdit($id){
        $product = Product::find($id);
        return view('crud.edit', compact('product'));
    }

    public function View($id){
        $product = Product::find($id);
        return view('crud.view', compact('product'));
    }

    public function Create(Request $request){

        $request->validate([
           'name' => 'required|string|max:255',
           'details' => 'required|string|max:255',
        ],[
            'name.required' => 'name is required',
            'name.string' => 'name is string',
            'name.max' => 'name has a 255 max of caracters',

            'details.required' => 'details is required',
            'details.string' => 'details is string',
            'details.max' => 'details has a 255 max of caracters',
        ]);

        $product = new Product();
        
        $product->name = $request->name;
        $product->details = $request->details;

        if($product->save()){
            return redirect()->route('index')->with('success', 'Produit est ajoutée avec succèss.');
        }else{ 
            return redirect()->back()->with('erreurs', 'Produit non enregistrée');
        }
        
        
    }

    public function Edit(Request $request, $id){

        $request->validate([
           'name' => 'required|string|max:255',
           'details' => 'required|string|max:255',
        ],[
            'name.required' => 'name is required',
            'name.string' => 'name is string',
            'name.max' => 'name has a 255 max of caracters',

            'details.required' => 'details is required',
            'details.string' => 'details is string',
            'details.max' => 'details has a 255 max of caracters',
        ]);

        $product = Product::find($id);
        
        $product->name = $request->name;
        $product->details = $request->details;

        if($product->save()){
            return redirect()->route('index')->with('success', 'Produit est modifiée avec succèss.');
        }else{ 
            return redirect()->back()->with('erreurs', 'Produit non modifiée');
        }
        
        
    }

    



    
}
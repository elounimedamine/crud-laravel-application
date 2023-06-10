<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index_category(){
        $categories = Category::all();
        return view('crud_categories.index', compact('categories'));
    }

    public function DeleteCategory($id){
        $categorie = Category::find($id);
        $categorie->delete();

        return redirect()->back()->with('success', 'Catégorie est supprimée avec succèss');  
    }

    public function ShowCreateCategory(){
        return view('crud_categories.create');
    }

    public function ShowEditCategory($id){
        $categorie = Category::find($id);
        return view('crud_categories.edit', compact('categorie'));
    }

    public function ViewCategory($id){
        $categorie = Category::find($id);
        return view('crud_categories.view', compact('categorie'));
    }

    public function CreateCategory(Request $request){

        $request->validate([
           'name_category' => 'required|string|max:255',
           'details_category' => 'required|string|max:255',
        ],[
            'name_category.required' => 'name_category is required',
            'name_category.string' => 'name_category is string',
            'name_category.max' => 'name_category has a 255 max of caracters',

            'details_category.required' => 'details_category is required',
            'details_category.string' => 'details_category is string',
            'details_category.max' => 'details_category has a 255 max of caracters',
        ]);

        $categorie = new Category();
        
        $categorie->name_category = $request->name_category;
        $categorie->details_category = $request->details_category;

        if($categorie->save()){
            return redirect()->route('index-category')->with('success', 'Catégorie est ajoutée avec succèss.');
        }else{ 
            return redirect()->back()->with('erreurs', 'Catégorie non enregistrée');
        }
        
        
    }

    public function EditCategory(Request $request, $id){

        $request->validate([
            'name_category' => 'required|string|max:255',
            'details_category' => 'required|string|max:255',
         ],[
             'name_category.required' => 'name_category is required',
             'name_category.string' => 'name_category is string',
             'name_category.max' => 'name_category has a 255 max of caracters',
 
             'details_category.required' => 'details_category is required',
             'details_category.string' => 'details_category is string',
             'details_category.max' => 'details_category has a 255 max of caracters',
         ]);

        $categorie = Category::find($id);
        
        $categorie->name_category = $request->name_category;
        $categorie->details_category = $request->details_category;

        if($categorie->save()){
            return redirect()->route('index-category')->with('success', 'Catégorie est modifiée avec succèss.');
        }else{ 
            return redirect()->back()->with('erreurs', 'Catégorie non modifiée');
        }
        
        
    }
    

}
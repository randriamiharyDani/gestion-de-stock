<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function add_product(Request $request){
        $request->validate([
            'name' =>'required',
            'price' =>'required|numeric',
            'stock' => 'required|numeric',
            'description' =>'required',
        ]);
        $product = new Produit() ;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('article')->with('succes' , "L'opération s'est déroulée avec succès !") ;
    }

    public function article()
    {
        //return view('page.accueil');
        return view('page.article',
     ['products' => Produit::all()]);

    }
    public function product_list(){
        return view('page.product-list' ,
     ['products' => Produit::all()]);
    }
    public function delete_product($id){
        $product = Produit::find($id);
        $product->delete();
        return redirect()->route('article')->with('succes' , "L'opération s'est déroulée avec succès !") ;

    }

    public function list_product(){
       $product = Produit::findAll() ;
       return response()->json($product);

    }
    public function select_product($id)
    {
        $product = Produit::find($id);
        return response()->json($product);
    }


    public function search_product($name){

    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function listStock() {
        // $product = Produit::findAll();
        return view('page.listStock' ,
            ['products' => Produit::all()]
        ) ;

    }

    public function addStock(Request $request)
    {
        dd($request);
        // $product = Produit::findAll();
        return view(
            'page.listStock',
            ['products' => Produit::all()]
        );
    }

}

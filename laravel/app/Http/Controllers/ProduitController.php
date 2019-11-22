<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Basket;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $produit = new Product();
        $product = $produit->where('id', $id)->first();

        return view('produit')->withProduct($product);
    }

    public function add(Request $request)
    {
        $panier = new Basket();
        $panier->title=$request->get('title');
        $panier->price=$request->get('price');
        $panier->Product_id=$request->get('id');
        $panier->users_id=$request->get('user_id');

        $ici = $request->get('id');
        $produit = Product::find($ici);
        if($produit->quantity > 0) {
            $produit->quantity -= 1;
            $produit->save();
            $panier->save();
        }
        else {
            return redirect()->action('ProduitController@index', [$ici]);
        }

        return redirect()->action('PanierController@index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Basket;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /* 1=>visiteur 2=>administrateur */
        if (2 == Auth::user()->Group_id) {

            $produit = Product::all();
            return view('admin')->withProducts($produit);

        } else {
            return back();
        }
    }

    public function traitement(Request $request)
    {
        $produit = new Product();

        $produit->title = $request->get('title');
        $produit->description = $request->get('description');
        $produit->category = $request->get('category');
        $produit->price = $request->get('price');
        $produit->quantity = $request->get('quantity');


        $this->validate($request, [
                'image'   => '
                required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->
                getClientOriginalExtension();
        $image->move(public_path("images"), $new_name);
        $produit->image = $new_name;

        $produit->users_id = $request->get('user_id');

        $produit->save();
        return redirect()->action('AdminController@index');
    }

    public function delete(Request $request) {

        Product::where ('id', $request->get('nbrproduct'))->first()->delete();
        Basket::where('title', $request->get('title'))->delete();
        return redirect()->action('AdminController@index');
    }

    public function modif($id) {

        $produit = Product::where ('id', $id)->first();
        return view('admin_modif')->withProduct($produit);
    }

    public function post_modif(Request $request) {

        $produit = Product::where ('id', $request->get('id'))->first();

        $produit->title = $request->get('title');
        $produit->description = $request->get('description');
        $produit->category = $request->get('category');
        $produit->price = $request->get('price');
        $produit->quantity = $request->get('quantity');

        $ime = $request->file('image');
        if ($ime)
        {
            $this->validate($request, [
                'image' => '
                required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);



            $image = $request->file('image');
            $new_name = rand() . '.' . $image->
                getClientOriginalExtension();
            $image->move(public_path("images"), $new_name);
            $produit->image = $new_name;
        }

        $produit->users_id = $request->get('user_id');

        $produit->save();
        return redirect()->action('AdminController@index');
    }
}

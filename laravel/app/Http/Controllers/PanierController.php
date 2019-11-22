<?php

namespace App\Http\Controllers;

use App\Model\Basket;
use App\Model\Product;
use App\Model\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admin=\DB::table('Basket')
            ->join('users', 'Basket.users_id', '=', 'users.id')
            ->where('Basket.users_id', Auth::user()->id)
            ->get();

        return view('panier')->withBasket($admin);
    }

    public function delete(Request $request)
    {
        Basket::where('users_id', $request->get('user_id'))->where('title', $request->get('title'))->first()->delete();
        $ici = $request->get('title');
        $produit = Product::where('title', $request->get('title'))->first();
        $produit->quantity += 1;
        $produit->save();
        return redirect()->action('PanierController@index');
    }

    public function paiement($id)
    {
        $nb = Basket::where('users_id', $id)->count();
        $table = Basket::where('users_id', $id)->paginate($nb);

        foreach ($table as $tableq) {
            $invoice = new Invoice();
            $invoice->title = $tableq->title;
            $invoice->price = $tableq->price;
            $invoice->users_id = $id;
            $invoice->save();
        }
        Basket::where('users_id', $id)->delete();
        return redirect()->action('PanierController@index');
    }
}

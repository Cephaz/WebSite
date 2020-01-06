<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        if ($id == 0 || $id != Auth::user()->id) {
            return redirect()->action('HomeController@index');
        }
        else {
            $profile = User::where('id', $id)->first();
            return view('profile')->withProfile($profile);
        }
    }

    public function add(Request $request)
    {
        $profile= User::findOrFail($request->get('id'));

        $profile->name=$request->get('name');
        $profile->firstname=$request->get('firstname');
        $profile->nickname=$request->get('nickname');
        $profile->email=$request->get('mail');
        $profile->phone=$request->get('phone');
        $profile->date=$request->get('date');

        $profile->save();

        return redirect()->action('ProfileController@index', ['id' => $request->get('id')]);
    }
    public function add2(Request $request)
    {
        $profile= User::findOrFail($request->get('id'));

        $profile->street=$request->get('street');
        $profile->postal=$request->get('postal');
        $profile->town=$request->get('town');
        $profile->country=$request->get('country');

        $profile->save();

        return redirect()->action('ProfileController@index', ['id' => $request->get('id')]);
    }
}

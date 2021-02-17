<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Test;

class PagesController extends Controller
{
    //static home
    public function home()
    {
        return view('pages.index');
    }
    //static about
    public function about()
    {
        $tests = Test::get();
        return view('pages.about')->with('tests', $tests);
    }
    //static services
    public function services()
    {
        // $products = DB::table('products')->get();
        // $products = Product::get();
        // $products = Product::all();
        // $products = Product::orderBy('product_price', 'asc')->get();
        $products = Product::orderBy('product_price', 'asc')->paginate(1);
        return view('pages.services')->with('products', $products);
    }
    //dynamic name profile
    // public function profile($name)
    // {
    //     return 'Profile Name : ' . $name . '';
    // }
    //dynamic name and id profile
    public function profile($name, $id = null)
    {
        if ($id !== null) {
            return 'Profile Name : ' . $name . ' and Id : ' . $id . '';
        } else {
            return 'Profile Name : ' . $name . '';
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.show')->with('product', $product);
    }

    public function create()
    {
        return view('pages.create');
    }
}

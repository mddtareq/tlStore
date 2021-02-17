<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Test;
use Illuminate\Support\Facades\Session;

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
        $products = Product::orderBy('product_price', 'asc')->paginate(5);
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
        // $product = DB::table('products')->where('id', $id)->first();
        return view('pages.show')->with('product', $product);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function createProduct(Request $request)
    {
        //laravelcollective required
        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required'
        ]);

        $product = new Product();
        //laravelcollective
        //$product->product_name = $request->input('product_name');
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;

        $product->save();

        //query builder

        // $data = array();
        // $data['product_name'] = $request->product_name;
        // $data['product_price'] = $request->product_price;
        // $data['product_description'] = $request->product_description;

        // DB::table('products')
        //     ->insert($data);

        //Session::put('success', 'Product has been added successfully');
        $request->session()->put('success', 'Product has been added successfully');

        return redirect('/create');
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('pages.edit')->with('product', $product);
    }

    public function updateProduct(Request $request)
    {

        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->update();
        // return view('pages.edit');
    }
}

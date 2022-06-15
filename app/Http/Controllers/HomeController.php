<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $categories = Category::with('subcategory.product','product')->where('parent_id', '=', NULL)->get();
            return view('home', compact('categories'));
        }else{
            return view('user');
        }
    }

    public function user()
    {
        return view('user');
    }

    public function addcategory()
    {
        $maincategories = DB::table('categories')->where('parent_id', '=', NULL)->get();
        return view('addcategory', compact('maincategories'));
    }

    public function storecategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect('home');
    }

    public function addproduct($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('addproduct', compact('category'));
    }

    public function storeproduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Product::create($request->all());

        return redirect('home');
    }
}

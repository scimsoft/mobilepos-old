<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductSearchController extends Controller
{
    public function index()
    {
        return view('products.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Product::select("NAME as name","PRICESELL as price")->where("NAME","LIKE","%{$request->input('query')}%")->get();

        return response()->json($data);
    }
}
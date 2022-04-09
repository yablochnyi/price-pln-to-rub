<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $poland_price = Product::all()->sum('poland_price');
        $russian_price = Product::all()->sum('russian_price');
        return view('price', compact('products', 'poland_price', 'russian_price'));
    }

    public function getUsd()
    {
        $file = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp");
        $xml = $file->xpath("//Valute[@ID='R01565']");
        $pln = $xml[0]->Value;
        return $pln;
    }


    public function addProduct(StoreProductRequest $request)
    {

        $data = $request->validated();
        $pln = $this->getUsd();
        $data['russian_price'] = $data['poland_price'] * $pln;

        Product::create($data);

        return redirect()->route('price');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('price');
    }
}

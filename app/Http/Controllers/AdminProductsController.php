<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;
use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\ProductsEditRequest;
use App\Photo;
use App\Product;

use App\Post;
use App\User;
use App\Role;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{
    //
    public function index()
    {
        //Alle producten uit de database halen
        $products = Product::all();
        return view ('admin.products.index',compact('products'));//compact draagt variabelen over
    }

    public function create()
    {
        //Voor een product aan te maken hebben we ook onze categorieën nodig en door lists() returnen we een array met alle waarden van name,id
        $categories = Category::lists('name','id')->all();
        return view ('admin.products.create',compact('categories'));
    }

    public function store(ProductsCreateRequest $request)
    {
        //Alle requesten binnenhalen en als de foto al bestaat blijft hij de zelfde houden en anders update hij die.
        $input = $request->all();
        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $product = Product::create($input);
        $product->categories()->sync($input['category_id']);

        return redirect('/admin/products')->with('success', 'Product successfully added!');
    }

    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = Category::lists('name', 'id')->all();
        return view('admin.products.edit', compact('product','categories'));
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id); //opzoeken van de te deleten product
        unlink(public_path() . $product->photo->file); //delete uit folder
        $product->categories()->detach();//Producten die bij een bepaalde categorie verwijderen in de tussentabel
        $product->delete(); //deleten van het product
        return redirect('/admin/products')->with('success', 'Product successfully deleted!');

    }

    public function update(ProductsEditRequest $request, $id)
    {
        //Product updaten met bijhorend id
        $product = Product::findOrFail($id);
       //form updaten richting db
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        $photo = Photo::create(['file'=>$name]);
        $input['photo_id'] = $photo->id;
        }

        $product->update($input);
        $product->categories()->sync($request['category_id']);
        return redirect('/admin/products');
    }


}

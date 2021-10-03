<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $data=Product::orderBy('name')->paginate(10);
        return view('product.index',compact('data'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'category'=>'required|numeric',
            'subcategory'=>'required|numeric',
            'price'=>'required|numeric',
            'description'=>'required|string'
        ]);
        $data=new Product;
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->subcategory_id=$request->subcategory;
        $data->price=$request->price;
        $data->descriptions=$request->description;
        $data->save();
        return back()->with('success','Product Add Successfully');
    }
    public function edit($id)
    {
        $data=Product::find(decrypt($id));
        return view('product.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string',
            'category'=>'required|numeric',
            'subcategory'=>'required|numeric'
        ]);
        $data=Product::find(decrypt($id));
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->subcategory_id=$request->subcategory;
        $data->price=$request->price;
        $data->descriptions=$request->description;
        $data->update();
        return back()->with('success','Product Updated Successfully');
    }
    public function destroy($id)
    {
        Product::find(decrypt($id))->delete();
        return back()->with('success','Product Deleted Successfully');
    }
}

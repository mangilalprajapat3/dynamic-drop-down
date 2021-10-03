<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
class SubcategoryController extends Controller
{
    public function index()
    {
        $data=Subcategory::orderBy('name')->paginate(10);
        return view('subcategory.index',compact('data'));
    }
    public function create()
    {
        return view('subcategory.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'category'=>'required|numeric'
        ]);
        $data=new Subcategory;
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->save();
        return back()->with('success','Subcategory Add Successfully');
    }
    public function edit($id)
    {
        $data=Subcategory::find(decrypt($id));
        return view('subcategory.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $data=Subcategory::find(decrypt($id));
        $data->name=$request->name;
        $data->category_id=$request->category;
        $data->update();
        return back()->with('success','Subcategory Updated Successfully');
    }
    public function destroy($id)
    {
        Subcategory::find(decrypt($id))->delete();
        return back()->with('success','Subcategory Deleted Successfully');
    }
}

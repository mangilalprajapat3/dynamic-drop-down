<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::orderBy('name')->paginate(10);
        return view('category.index',compact('data'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
        ]);
        $category=new Category;
        $category->name=$request->name;
        $category->save();
        return back()->with('success','Category Add Successfull');
    }
    public function edit($id)
    {
        $data=Category::find(decrypt($id));
        return view('category.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $category=Category::find(decrypt($id));
        $category->name=$request->name;
        $category->update();
        return back()->with('success','Category Updated Successfully');
    }
    public function destroy(Request $request,$id)
    {
        Category::find(decrypt($id) )->delete();
        return back()->with('success','Category Delete Successfully');
    }
    public function getSubcategoryByCategory(Request $request)
    {
        $subcategories=Subcategory::whereCategoryId($request->category_id)->get();
        return $subcategories;
    }
}

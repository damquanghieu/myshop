<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\CategoryRecusive;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    private $test;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        if (session('success')) {
            toast(session('success'), 'success');
        }
        $getCategories = $this->category->latest()->paginate(5);
        return view('admin.pages.category.view_category', compact('getCategories'));
    }
    
    public function create()
    {
        if(session('success')){
            toast(session('success'), 'success');
        }

        $recusive = new CategoryRecusive;
        $getAllCategory = $recusive->getParentCategory(0, "");
        return view('admin.pages.category.add_category', ['getAllCategory' => $getAllCategory]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:100',
        ], [
            'name.required' => "Tên danh mục không được trống!",
            'name.max' => "Tên danh mục < 100 kí tự!",
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back()->withSuccess('Thêm danh mục thành công');
    }

    public function edit($id)
    {
        if (session('success')) {
            toast(session('success'), 'succcess');
        }
        $findCategory = $this->category::find($id);
        $recusive = new CategoryRecusive;
        $getCategories = $recusive->getParentCategory(0, "", $findCategory->parent_id);
        return view('admin.pages.category.edit_category', compact('findCategory', 'getCategories'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|max:100',
        ], [
            'name.required' => "Tên danh mục không được trống!",
            'name.max' => 'Tên danh mục < 100 kí tự!',
        ]);
        $findCategory = $this->category::find($id);

        $findCategory->name = $request->name;
        $findCategory->status = $request->status;
        $findCategory->parent_id = $request->parent_id;
        $findCategory->save();
        return redirect()->route('index.category')->withSuccess('Edit category success');

    }

    public function destroy($id)
    {
        $findCategory = $this->category::find($id)->delete();
        $this->category::where('parent_id', '=', $id)->delete();
    }
    
}

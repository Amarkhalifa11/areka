<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function all_categoty()
    {
        $categories = Category::all();
        return view('backend.category.all_category' , compact('categories'));
    }

    public function create()
    {
        return view('backend.category.add_category');
    }

    public function store(StoreCategoryRequest $request)
    {
        $title = $request->title;

        $categories = Category::create([
            'title' => $title
        ]);

        return redirect()->route('dashboard.category.all_categoty')->with('message' , 'the category is added successfuly');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('backend.category.edit_category' , compact('categories'));
    }

    public function update(UpdateCategoryRequest $request,$id)
    {
        $categories = Category::find($id);
        $title = $request->title;
        $categories->update([
            'title' => $title
        ]);

        return redirect()->route('dashboard.category.all_categoty')->with('message' , 'the category is updated successfuly');

    }

    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('dashboard.category.all_categoty')->with('message' , 'the category is deleted successfuly');

    }
}

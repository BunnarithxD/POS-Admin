<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
  
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        
      
        $categories->getCollection()->transform(function ($category, $key) use ($categories) {
            $category->created_at_formatted = Carbon::parse($category->created_at)->format('d/m/Y');
            $category->demo_no = $categories->currentPage() * $categories->perPage() - $categories->perPage() + $key + 1;
            return $category;
        });

        return view('categories.index', compact('categories'));
    }

   
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name',
            'description'   => 'nullable|string',
            'status'        => 'required|string|in:Actived,InActive',
        ]);

        $validated['created_by'] = auth()->id();

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

  
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description'   => 'nullable|string',
            'status'        => 'required|string|in:Actived,InActive',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('superadmin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->only(['name', 'image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $image->storeAs('public/images', $originalName);
        }
        $data['image'] = $originalName;
        // dd($data);
        Category::create($data);
        return redirect('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        $products = $category->products;
        return view('products.category', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('superadmin.addcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $currentImages = $category->image;
        $data = request()->only(['name', 'image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            // dd($originalName);
            $image->storeAs('public/images', $originalName);
            $path = public_path('storage/images/' . $currentImages);
            if (File::exists($path)) {
                File::delete($path);
            }
            $data['image'] = $originalName;
        } else {
            $data['image'] = $currentImages;
        }
        $category->update($data);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if ($category->image) {
            $path = public_path('storage/images/' . $category->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $category->delete();
        } else {
            Category::destroy($id);
        }
        return redirect('category');
    }
}

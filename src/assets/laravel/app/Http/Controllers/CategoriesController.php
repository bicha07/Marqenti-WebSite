<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    // Assuming you want to display services, we'll need an index method.
    public function index()
    {
        $categories = Category::all(); // Fetch all services from the database.
        return view('laravel-examples.service-management', compact('categories'));
    }

    public function create()
    {
        // If you have a separate create page, you can redirect to it here.
        // Otherwise, if creation is done on the same page as listing, you can remove this method.
        return view('laravel-examples.category-create'); // Use the correct view name for service creation.
    }

    public function store(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'name' => 'required|max:50', // Adjust validation rules as necessary.

        ]);

        // Create a new service.
        Category::create([
            'name' => $request->name,

        ]);

        // Redirect to the service management page with a success message.
        return redirect()->route('categories.index')->with('success', 'category created successfully.');
    }

    public function edit(Category $category)
    {
        // Direct to the edit view with the service model.
        return view('laravel-examples.categories-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate the request data.
        $request->validate([
            'name' => ['required', 'max:50', Rule::unique('categories')->ignore($category->id)],


        ]);

        // Update the service.
        $category->update([
            'name' => $request->name,
        ]);

        // Redirect to the service management page with a success message.
        return redirect()->route('categories.index')->with('success', 'categories updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Delete the service.
        $category->delete();

        // Redirect to the service management page with a success message.
        return redirect()->route('categories.index')->with('success', 'category deleted successfully.');
    }
}


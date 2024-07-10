<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    // Assuming you want to display services, we'll need an index method.
    public function index()
    {
        $categories = Category::all();
        $services = Service::all(); // Fetch all services from the database.
        return view('laravel-examples.service-management', compact('services', 'categories'));
    }

    public function create()
    {
        // If you have a separate create page, you can redirect to it here.
        // Otherwise, if creation is done on the same page as listing, you can remove this method.
        return view('laravel-examples.service-create'); // Use the correct view name for service creation.
    }

    public function store(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'name' => 'required|max:50', // Adjust validation rules as necessary.
            'price' => 'required|numeric', // Ensure the price is numeric.
            'category' => 'required|max:50', // Adjust validation rules as necessary.

        ]);

        // Create a new service.
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,

        ]);

        // Redirect to the service management page with a success message.
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        // Direct to the edit view with the service model.
        return view('laravel-examples.service-edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // Validate the request data.
        $request->validate([
            'name' => ['required', 'max:50', Rule::unique('services')->ignore($service->id)],
            'price' => 'required|numeric', // Ensure the price is numeric.
            'category' => 'required|max:50', // Adjust validation rules as necessary.

        ]);

        // Update the service.
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        // Redirect to the service management page with a success message.
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Delete the service.
        $service->delete();

        // Redirect to the service management page with a success message.
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}


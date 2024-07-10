<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Service;

class PacksController extends Controller
{
    // Display a listing of the packs.
    public function index()
    {
        $packs = Pack::all();
        $services = Service::all(); // Fetch all services from the database.
        return view('laravel-examples.packs', compact('packs','services'));
    }

    // Show the form for creating a new pack.
    public function create()
    {
        $services = Service::all(); // Get all services for selection
        return view('packs.create', compact('services'));
    }

    // Store a newly created pack in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'services' => 'required|array', // Expect an array of service IDs
        ]);

        $pack = Pack::create($request->only('name'));

        // Attach the services to the pack
        $pack->services()->attach($request->services);

        return redirect()->route('packs.index')->with('success', 'Pack created successfully.');
    }

    // Display the specified pack.
    public function show(Pack $pack)
    {
        return view('packs.show', compact('pack'));
    }

    // Show the form for editing the specified pack.
    public function edit(Pack $pack)
    {
        $services = Service::all(); // Get all services for selection
        return view('packs.edit', compact('pack', 'services'));
    }

    // Update the specified pack in the database.
    public function update(Request $request, Pack $pack)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'services' => 'required|array', // Expect an array of service IDs
        ]);

        $pack->update($request->only('name'));

        // Update the services associated with the pack
        $pack->services()->sync($request->services);

        return redirect()->route('packs.index')->with('success', 'Pack updated successfully.');
    }

    // Remove the specified pack from the database.
    public function destroy(Pack $pack)
    {
        $pack->services()->detach(); // Detach all services before deleting the pack
        $pack->delete();

        return redirect()->route('packs.index')->with('success', 'Pack deleted successfully.');
    }
}

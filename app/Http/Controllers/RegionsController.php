<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    public function create()
    {
        return view('regions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|numeric',
            'localisation' => 'nullable|string|max:255']);

        Region::create($request->all());

        return redirect()->route('admin.regions.index')
            ->with('success', 'Region créé avec succès.');
    }

    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate(['nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|numeric',
            'localisation' => 'nullable|string|max:255']);

        $region->update($request->all());

        return redirect()->route('admin.regions.index')
            ->with('success', 'Region mis à jour avec succès.');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('admin.regions.index')
            ->with('success', 'Region supprimé avec succès.');
    }
}
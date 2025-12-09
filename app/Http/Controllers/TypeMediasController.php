<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediasController extends Controller
{
    public function index()
    {
        $typemedias = TypeMedia::all();
        return view('typemedias.index', compact('typemedias'));
    }

    public function create()
    {
        return view('typemedias.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255|unique:type_medias']);

        TypeMedia::create($request->all());

        return redirect()->route('admin.typemedias.index')
            ->with('success', 'TypeMedia créé avec succès.');
    }

    public function show(TypeMedia $typemedia)
    {
        return view('typemedias.show', compact('typemedia'));
    }

    public function edit(TypeMedia $typemedia)
    {
        return view('typemedias.edit', compact('typemedia'));
    }

    public function update(Request $request, TypeMedia $typemedia)
    {
       $request->validate([
        'nom' => 'required|string|max:255|unique:type_medias,nom,' . $typemedia->id // Correction ici
    ]);

    $typemedia->update($request->all());

    return redirect()->route('admin.typemedias.index')
        ->with('success', 'Type de média mis à jour avec succès.');
    }

    public function destroy(TypeMedia $typemedia)
    {
        $typemedia->delete();

        return redirect()->route('admin.typemedias.index')
            ->with('success', 'TypeMedia supprimé avec succès.');
    }
}
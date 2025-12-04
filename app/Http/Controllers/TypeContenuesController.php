<?php

namespace App\Http\Controllers;

use App\Models\TypeContenue;
use Illuminate\Http\Request;

class TypeContenuesController extends Controller
{
    public function index()
    {
        $typecontenus = TypeContenue::all();
        return view('typecontenus.index', compact('typecontenus'));
    }

    public function create()
    {
        return view('typecontenus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:type_contenues'
        ]);

        TypeContenue::create($request->all());

        return redirect()->route('typecontenus.index')
            ->with('success', 'Type de contenu créé avec succès.');
    }

    public function show($id)
    {
        $typecontenue = TypeContenue::findOrFail($id);
        return view('typecontenus.show', compact('typecontenue'));
    }

    public function edit($id)
    {
        $typecontenue = TypeContenue::findOrFail($id);
        return view('typecontenus.edit', compact('typecontenue'));
    }

    public function update(Request $request, $id)
    {
        $typecontenue = TypeContenue::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255|unique:type_contenues,nom,' . $id
        ]);

        $typecontenue->update($request->all());

        return redirect()->route('typecontenus.index')
            ->with('success', 'Type de contenu mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $typecontenue = TypeContenue::findOrFail($id);
        $typecontenue->delete();

        return redirect()->route('typecontenus.index')
            ->with('success', 'Type de contenu supprimé avec succès.');
    }
}
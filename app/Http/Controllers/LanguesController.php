<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LanguesController extends Controller
{
    public function index()
    {
        $langues = Langue::all();
        return view('langues.index', compact('langues'));
    }

    public function create()
    {
        return view('langues.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues',
            'description' => 'nullable|string']);

        Langue::create($request->all());

        return redirect()->route('admin.langues.index')
            ->with('success', 'Langue créé avec succès.');
    }

    public function show(Langue $langue)
    {
        return view('langues.show', compact('langue'));
    }

    public function edit(Langue $langue)
    {
        return view('langues.edit', compact('langue'));
    }

    public function update(Request $request, Langue $langue)
    {
         $request->validate([
        'nom' => 'required|string|max:255',
        'code_langue' => 'required|string|max:10|unique:langues,code_langue,' . $langue->id, // Correction ici
        'description' => 'nullable|string'
    ]);

    $langue->update($request->all());

    return redirect()->route('admin.langues.index')
        ->with('success', 'Langue mise à jour avec succès.');
    }

    public function destroy(Langue $langue)
    {
        $langue->delete();

        return redirect()->route('admin.langues.index')
            ->with('success', 'Langue supprimé avec succès.');
    }
}
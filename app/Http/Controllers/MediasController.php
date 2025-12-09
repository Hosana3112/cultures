<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\TypeMedia;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediasController extends Controller
{
    public function index()
    {
        $medias = Media::with(['type_media', 'contenu'])->get();
        return view('medias.index', compact('medias'));
    }

    public function create()
    {
        $typemedias = TypeMedia::all();
        $contenus = Contenu::all();
        return view('medias.create', compact('typemedias', 'contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fichier' => 'required|file|max:5120', // 5MB max
            'description' => 'nullable|string',
            'type_media_id' => 'required|integer|exists:type_medias,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ]);

        // Upload du fichier
        $fichier = $request->file('fichier');
        $chemin = $fichier->store('medias', 'public');

        // Création du média
        Media::create([
            'chemin' => $chemin,
            'nom_original' => $fichier->getClientOriginalName(),
            'mime_type' => $fichier->getMimeType(),
            'taille' => $fichier->getSize(),
            'description' => $request->description,
            'type_media_id' => $request->type_media_id,
            'contenu_id' => $request->contenu_id
        ]);

        return redirect()->route('admin.medias.index')
            ->with('success', 'Média uploadé avec succès.');
    }

    public function show(Media $media)
    {
        return view('medias.show', compact('media'));
    }

    public function download(Media $media)
    {
        if (Storage::disk('public')->exists($media->chemin)) {
            return Storage::disk('public')->medias.download($media->chemin, $media->nom_original);
        }
        
        return back()->with('error', 'Fichier non trouvé.');
    }

    public function stream(Media $media)
    {
        if (Storage::disk('public')->exists($media->chemin)) {
            $path = Storage::disk('public')->path($media->chemin);
            return response()->file($path);
        }
        
        return back()->with('error', 'Fichier non trouvé.');
    }

    public function edit(Media $media)
    {
        $typemedias = TypeMedia::all();
        $contenus = Contenu::all();
        return view('medias.edit', compact('media', 'typemedias', 'contenus'));
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'fichier' => 'nullable|file|max:5120',
            'description' => 'nullable|string',
            'type_media_id' => 'required|integer|exists:type_medias,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ]);

        $data = [
            'description' => $request->description,
            'type_media_id' => $request->type_media_id,
            'contenu_id' => $request->contenu_id
        ];

        // Si nouveau fichier
        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien
            Storage::disk('public')->delete($media->chemin);
            
            $fichier = $request->file('fichier');
            $chemin = $fichier->store('medias', 'public');

            $data = array_merge($data, [
                'chemin' => $chemin,
                'nom_original' => $fichier->getClientOriginalName(),
                'mime_type' => $fichier->getMimeType(),
                'taille' => $fichier->getSize()
            ]);
        }

        $media->update($data);

        return redirect()->route('admin.medias.index')
            ->with('success', 'Média mis à jour avec succès.');
    }

    public function destroy(Media $media)
    {
        // Supprimer le fichier physique
        Storage::disk('public')->delete($media->chemin);
        
        // Supprimer de la base
        $media->delete();

        return redirect()->route('admin.medias.index')
            ->with('success', 'Média supprimé avec succès.');
    }
}
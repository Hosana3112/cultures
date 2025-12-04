<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$controllers = [
    'RolesController' => [
        'model' => 'Role',
        'fields' => ['nom' => 'required|string|max:255|unique:roles'],
        'update_fields' => ['nom' => 'required|string|max:255|unique:roles,nom,{id}']
    ],
    'LanguesController' => [
        'model' => 'Langue', 
        'fields' => [
            'nom' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues',
            'description' => 'nullable|string'
        ],
        'update_fields' => [
            'nom' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues,code_langue,{id}',
            'description' => 'nullable|string'
        ]
    ],
    'TypeMediasController' => [
        'model' => 'TypeMedia',
        'fields' => ['nom' => 'required|string|max:255|unique:type_medias'],
        'update_fields' => ['nom' => 'required|string|max:255|unique:type_medias,nom,{id}']
    ],
    'TypeContenuesController' => [
        'model' => 'TypeContenue',
        'fields' => ['nom' => 'required|string|max:255|unique:type_contenues'],
        'update_fields' => ['nom' => 'required|string|max:255|unique:type_contenues,nom,{id}']
    ],
    'MediasController' => [
        'model' => 'Media',
        'fields' => [
            'chemin' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type_media_id' => 'required|integer|exists:type_medias,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ],
        'update_fields' => [
            'chemin' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type_media_id' => 'required|integer|exists:type_medias,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ]
    ],
    'RegionsController' => [
        'model' => 'Region',
        'fields' => [
            'nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|numeric',
            'localisation' => 'nullable|string|max:255'
        ],
        'update_fields' => [
            'nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|numeric',
            'localisation' => 'nullable|string|max:255'
        ]
    ],
    'UtilisateursController' => [
        'model' => 'Utilisateur',
        'fields' => [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:6',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'required|date',
            'statut' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'langue_id' => 'required|integer|exists:langues,id',
            'role_id' => 'required|integer|exists:roles,id'
        ],
        'update_fields' => [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,{id}',
            'mot_de_passe' => 'sometimes|string|min:6',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'required|date',
            'statut' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'langue_id' => 'required|integer|exists:langues,id',
            'role_id' => 'required|integer|exists:roles,id'
        ]
    ],
    'ContenusController' => [
        'model' => 'Contenu',
        'fields' => [
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'statut' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:contenus,id',
            'date_validation' => 'nullable|date',
            'type_contenu_id' => 'required|integer|exists:type_contenues,id',
            'auteur_id' => 'required|integer|exists:utilisateurs,id',
            'region_id' => 'required|integer|exists:regions,id',
            'moderateur_id' => 'nullable|integer|exists:utilisateurs,id'
        ],
        'update_fields' => [
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'statut' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:contenus,id',
            'date_validation' => 'nullable|date',
            'type_contenu_id' => 'required|integer|exists:type_contenues,id',
            'auteur_id' => 'required|integer|exists:utilisateurs,id',
            'region_id' => 'required|integer|exists:regions,id',
            'moderateur_id' => 'nullable|integer|exists:utilisateurs,id'
        ]
    ],
    'CommentairesController' => [
        'model' => 'Commentaire',
        'fields' => [
            'texte' => 'required|string',
            'note' => 'required|integer|min:1|max:5',
            'user_id' => 'required|integer|exists:utilisateurs,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ],
        'update_fields' => [
            'texte' => 'required|string',
            'note' => 'required|integer|min:1|max:5',
            'user_id' => 'required|integer|exists:utilisateurs,id',
            'contenu_id' => 'required|integer|exists:contenus,id'
        ]
    ]
];

foreach ($controllers as $controllerName => $config) {
    $modelName = $config['model'];
    $variableName = strtolower($modelName);
    
    // Lit le contenu existant du contrôleur
    $controllerPath = app_path("Http/Controllers/{$controllerName}.php");
    $existingContent = file_get_contents($controllerPath);
    
    // Génère seulement le contenu des méthodes
    $methodsContent = generateMethodsContent($controllerName, $modelName, $variableName, $config['fields'], $config['update_fields']);
    
    // Remplace la classe vide par le contenu complet
    $newContent = generateCompleteController($controllerName, $modelName, $methodsContent);
    
    file_put_contents($controllerPath, $newContent);
    
    echo "✅ Controller {$controllerName} complété!\n";
}

echo "🎉 TOUS LES CONTROLLERS ONT ÉTÉ COMPLÉTÉS!\n";

function generateCompleteController($controllerName, $modelName, $methodsContent) {
    return <<<PHP
<?php

namespace App\Http\Controllers;

use App\\Models\\{$modelName};
use Illuminate\Http\Request;

class {$controllerName} extends Controller
{
{$methodsContent}
}
PHP;
}

function generateMethodsContent($controllerName, $modelName, $variableName, $fields, $updateFields) {
    $validationRules = generateValidationRules($fields);
    $updateValidationRules = generateValidationRules($updateFields, true, $variableName);
    
    $viewFolder = str_replace('Controller', '', strtolower($controllerName));
    
    return <<<PHP
    public function index()
    {
        \${$viewFolder} = {$modelName}::all();
        return view('{$viewFolder}.index', compact('{$viewFolder}'));
    }

    public function create()
    {
        return view('{$viewFolder}.create');
    }

    public function store(Request \$request)
    {
        \$request->validate([{$validationRules}]);

        {$modelName}::create(\$request->all());

        return redirect()->route('{$viewFolder}.index')
            ->with('success', '{$modelName} créé avec succès.');
    }

    public function show({$modelName} \${$variableName})
    {
        return view('{$viewFolder}.show', compact('{$variableName}'));
    }

    public function edit({$modelName} \${$variableName})
    {
        return view('{$viewFolder}.edit', compact('{$variableName}'));
    }

    public function update(Request \$request, {$modelName} \${$variableName})
    {
        \$request->validate([{$updateValidationRules}]);

        \${$variableName}->update(\$request->all());

        return redirect()->route('{$viewFolder}.index')
            ->with('success', '{$modelName} mis à jour avec succès.');
    }

    public function destroy({$modelName} \${$variableName})
    {
        \${$variableName}->delete();

        return redirect()->route('{$viewFolder}.index')
            ->with('success', '{$modelName} supprimé avec succès.');
    }
PHP;
}

function generateValidationRules($fields, $isUpdate = false) {
    $rules = [];
    foreach ($fields as $field => $rule) {
        if ($isUpdate && str_contains($rule, 'unique')) {
            $rule = str_replace('{id}', "' . \${$field}->id . '", $rule);
        }
        $rules[] = "'{$field}' => '{$rule}'";
    }
    return implode(",\n            ", $rules);
}
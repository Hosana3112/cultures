<?php

return [

    /*
     * Activer / désactiver l'authentification à deux facteurs.
     */
    'enabled' => env('GOOGLE_2FA_ENABLED', true),

    /*
     * Durée de vie en minutes.
     *
     * Si vous souhaitez que vos utilisateurs soient invités à saisir
     * un nouveau mot de passe à usage unique de temps en temps.
     */
    'lifetime' => env('GOOGLE_2FA_LIFETIME', 0), // 0 = éternel

    /*
     * Renouveler la durée de vie à chaque nouvelle requête.
     */
    'keep_alive' => env('GOOGLE_2FA_KEEP_ALIVE', true),

    /*
     * Liaison du conteneur d'authentification.
     */
    'auth' => 'auth',

    /*
     * Garde.
     */
    'guard' => '',

    /*
     * Variable de session pour la vérification 2FA.
     */
    'session_var' => 'google2fa',

    /*
     * Nom du champ de saisie du mot de passe à usage unique.
     */
    'otp_input' => 'code',

    /*
     * Fenêtre de tolérance pour le mot de passe à usage unique.
     * Permet une tolérance de ±1 intervalle de temps (30 secondes).
     */
    'window' => 1,

    /*
     * Interdire la réutilisation des mots de passe à usage unique.
     */
    'forbid_old_passwords' => false,

    /*
     * Colonne de la table utilisateur pour le secret Google 2FA.
     */
    'otp_secret_column' => 'google2fa_secret',

    /*
     * Vue pour la saisie du mot de passe à usage unique.
     */
    'view' => 'auth.two-factor-challenge',

    /*
     * Messages d'erreur.
     */
    'error_messages' => [
        'wrong_otp'       => "Le code de vérification est incorrect.",
        'cannot_be_empty' => 'Le code de vérification ne peut pas être vide.',
        'unknown'         => 'Une erreur inconnue est survenue. Veuillez réessayer.',
    ],

    /*
     * Lancer des exceptions ou simplement déclencher des événements ?
     */
    'throw_exceptions' => env('GOOGLE_2FA_THROW_EXCEPTIONS', false),

    /*
     * Quel moteur d'image utiliser pour générer les codes QR ?
     *
     * Supporte : imagemagick, svg et eps
     */
    'qrcode_image_backend' => \PragmaRX\Google2FALaravel\Support\Constants::QRCODE_IMAGE_BACKEND_SVG,

    /*
     * Nom de l'application à afficher dans Google Authenticator.
     */
    'issuer' => env('APP_NAME', 'Votre Application'),

    /*
     * Configuration des codes QR.
     */
    'qrcode' => [
        'size' => 300,
        'margin' => 4,
        'error_correction' => 'M', // L, M, Q, H
    ],

];
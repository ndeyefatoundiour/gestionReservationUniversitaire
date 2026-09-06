<?php
declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

require_once dirname(__DIR__) . '/bootstrap.php';

echo " Nettoyage et démarrage de la création des deux tables...\n";

Capsule::schema()->dropIfExists('reservations');
Capsule::schema()->dropIfExists('salles');
echo " Anciennes tables supprimées proprement.\n";

Capsule::schema()->create('salles', function (Blueprint $table) {
    $table->id(); 
    $table->string('nom'); 
    $table->string('batiment'); 
    $table->integer('capacite'); 
    
    $table->enum('type', ['cours', 'informatique', 'laboratoire', 'amphitheatre', 'reunion']);
    
    $table->boolean('active')->default(true); 
    $table->timestamps(); 
});
echo " Table 'salles' créée avec succès.\n";

Capsule::schema()->create('reservations', function (Blueprint $table) {
    $table->id(); 
    
    $table->foreignId('salle_id')
          ->constrained('salles')
          ->onDelete('cascade'); 
          
    $table->string('responsable'); 
    $table->string('email'); 
    $table->string('motif'); 
    $table->dateTime('date_debut');
    $table->dateTime('date_fin'); 
    $table->enum('statut', ['confirmée', 'annulée'])->default('confirmée');
    $table->timestamps(); 
});
echo " Table 'reservations' créée avec succès.\n";

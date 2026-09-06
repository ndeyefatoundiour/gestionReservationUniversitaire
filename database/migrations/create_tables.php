<?php
declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

require_once dirname(__DIR__) . '/bootstrap.php';

echo " Nettoyage et démarrage de la création des tables...\n";

Capsule::schema()->dropIfExists('reservations');
Capsule::schema()->dropIfExists('salles');
Capsule::schema()->dropIfExists('types_salle');
echo "  Anciennes tables supprimées proprement.\n";

Capsule::schema()->create('types_salle', function (Blueprint $table) {
    $table->id(); 
    $table->string('nom', 100)->unique(); 
});
echo " Table 'types_salle' créée avec succès.\n";

Capsule::table('types_salle')->insert([
    ['nom' => 'cours'],
    ['nom' => 'informatique'],
    ['nom' => 'laboratoire'],
    ['nom' => 'amphitheatre'],
    ['nom' => 'reunion']
]);
echo " Les 5 types ont été enregistrés.\n";

Capsule::schema()->create('salles', function (Blueprint $table) {
    $table->id(); 
    $table->string('nom'); 
    $table->string('batiment'); 
    $table->integer('capacite'); 

    $table->foreignId('type_id')
          ->constrained('types_salle')
          ->onDelete('restrict'); 
          
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

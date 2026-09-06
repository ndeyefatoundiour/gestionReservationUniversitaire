<?php
declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/bootstrap.php';

Capsule::table('reservations')->truncate();
Capsule::statement('SET FOREIGN_KEY_CHECKS=0;');
Capsule::table('salles')->truncate();
Capsule::statement('SET FOREIGN_KEY_CHECKS=1;');

$idCours = Capsule::table('types_salle')->where('nom', 'cours')->value('id');
$idInfo = Capsule::table('types_salle')->where('nom', 'informatique')->value('id');
$idLabo = Capsule::table('types_salle')->where('nom', 'laboratoire')->value('id');
$idAmphi = Capsule::table('types_salle')->where('nom', 'amphitheatre')->value('id');
$idReunion = Capsule::table('types_salle')->where('nom', 'reunion')->value('id');

$salles = [
    [
        'nom' => 'Amphi Turing',
        'batiment' => 'Bâtiment A',
        'capacite' => 150,
        'type_id' => $idAmphi, 
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Salle Ada Lovelace',
        'batiment' => 'Bâtiment B',
        'capacite' => 25,
        'type_id' => $idInfo,
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Labo Marie Curie',
        'batiment' => 'Bâtiment C',
        'capacite' => 15,
        'type_id' => $idLabo,
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Salle de Réunion Élysée',
        'batiment' => 'Bâtiment Administratif',
        'capacite' => 10,
        'type_id' => $idReunion,
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Salle 101',
        'batiment' => 'Bâtiment A',
        'capacite' => 35,
        'type_id' => $idCours,
        'active' => false, 
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]
];

Capsule::table('salles')->insert($salles);

echo " Données de test insérées avec succès \n";

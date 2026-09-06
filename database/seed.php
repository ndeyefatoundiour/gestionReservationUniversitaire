<?php
declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/bootstrap.php';

echo "Démarrage du peuplement (seeding) de la base de données...\n";

Capsule::table('reservations')->truncate();
Capsule::statement('SET FOREIGN_KEY_CHECKS=0;');
Capsule::table('salles')->truncate();
Capsule::statement('SET FOREIGN_KEY_CHECKS=1;');

$salles = [
    [
        'nom' => 'Amphi Turing',
        'batiment' => 'Bâtiment A',
        'capacite' => 150,
        'type' => 'amphitheatre',
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Salle Ada Lovelace',
        'batiment' => 'Bâtiment B',
        'capacite' => 25,
        'type' => 'informatique',
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Labo Marie Curie',
        'batiment' => 'Bâtiment C',
        'capacite' => 15,
        'type' => 'laboratoire',
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Salle de Réunion Élysée',
        'batiment' => 'Bâtiment Administratif',
        'capacite' => 10,
        'type' => 'reunion',
        'active' => true,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ],
    [
        'nom' => 'Salle 101',
        'batiment' => 'Bâtiment A',
        'capacite' => 35,
        'type' => 'cours',
        'active' => false, 
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]
];

Capsule::table('salles')->insert($salles);

echo " Données de test insérées avec succès (5 salles prêtes à l'emploi) !\n";

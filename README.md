1️⃣ Quel est le rôle de Composer ?

**Composer** est le **gestionnaire de dépendances** officiel du langage PHP. Son rôle principal est double :

* **Gestion des bibliothèques externes :** Il télécharge, installe et met à jour automatiquement les paquets de code créés par d'autres développeurs (comme FastRoute ou PHP-DI) dont votre projet a besoin pour fonctionner, tout en gérant leurs compatibilités.
* **Autoloading (Chargement automatique) :** Il génère un fichier unique (`vendor/autoload.php`) basé sur des normes standards ( **PSR-4** **). Ce mécanisme permet à PHP de trouver et de charger automatiquement vos propres classes ainsi que les paquets externes sans que vous n'ayez jamais à écrire de **`require` ou d'`include` manuels.

2️⃣ Quelle différence existe entre `require` et `require-dev` ?

La différence réside dans l'**environnement** où les paquets seront utilisés :

* **`require` :** Contient les dépendances **indispensables à l'application pour fonctionner en production** (le site final accessible par les utilisateurs)
* **`require-dev` :** Contient les outils nécessaires  **uniquement durant la phase de développement ou de test** **, qui ne doivent pas être envoyés sur le serveur de production. Exemples : ***PHPUnit* pour exécuter vos tests unitaires, ou des outils de formatage de code (linters).

3️⃣ Pourquoi faut-il versionner `composer.lock` 

Il faut obligatoirement versionner le fichier `composer.lock` sur Git pour  **garantir la cohérence et la stabilité du projet au sein de l'équipe** .

* **Lorsque on lance **`composer install`, Composer ne cherche pas les dernières versions disponibles sur Internet : il lit le fichier `composer.lock` et installe  **exactement les mêmes versions de paquets, au bit près** **, que celles présentes sur votre machine.**
* **Cela évite un bug professionnel lorsque vous ou un camarade récupère mon code.

4️⃣ Pourquoi ne versionne-t-on pas `vendor/` ?

Le dossier `vendor/` ne doit jamais être envoyé sur Git pour trois raisons fondamentales :

* **Légèreté du dépôt :** Ce dossier contient des milliers de fichiers lourds écrits par d'autres développeurs. Le versionner ralentirait considérablement vos commandes Git (`git clone`, `git push`).
* **Redondance :** Le fichier `composer.json` (et le `.lock`) contient déjà la "recette de cuisine" exacte de votre projet. Il suffit de taper la commande `composer install` pour que Composer recrée instantanément le dossier `vendor/` à l'identique sur n'importe quelle machine.
* **Sécurité & Maintenance :** On ne traque sur Git que le code propriétaire que l'on écrit soi-même, pas le code externe qui évolue indépendamment de notre projet.

jai aussi cree une classe apllication a lappeler dans l'index et c'est passer pour la verification des 

```php
namespace App\Application;
```

jai eu comme resutat

 Succès ! Composer charge parfaitement la classe App\Application\Application depuis son propre dossier.

---

# NutriThub --- Projet de Programmation WEB (XTI205-CYB)

## 1. Présentation du projet

NutriThub est un site web dédié à la nutrition et au sport.

Le site permet aux utilisateurs de :

-   Consulter différents programmes sportifs (débutant, perte de poids,
    prise de masse)
-   Utiliser plusieurs calculateurs (calories, IMC, IMM, protéines)
-   Enregistrer certains calculs dans une base de données SQLite

Le projet existe en deux versions :

-   `site-html/` : version statique (HTML + JavaScript + API PHP)
-   `site-php/` : version dynamique en PHP avec includes (header et
    footer)

------------------------------------------------------------------------

## 2. Lancement du projet avec Docker

### Prérequis

-   Docker
-   Docker Compose

### Commande à exécuter

    docker compose up --build

### Accès au site

-   Version PHP : http://localhost:8080\
-   Version HTML : http://localhost:8081

------------------------------------------------------------------------

## 3. Structure générale du projet

    .
    ├── Dockerfile
    ├── docker-compose.yml
    ├── site-html/
    └── site-php/

Le projet contient deux implémentations du même site : une version
statique et une version PHP plus structurée.

------------------------------------------------------------------------

# 4. Fichiers à la racine

## Dockerfile

Ce fichier sert à créer l'image Docker pour la version PHP.

Il :

-   Utilise PHP 8.2 avec Apache
-   Active le module `rewrite`
-   Installe SQLite
-   Active l'extension `pdo_sqlite`
-   Prépare le dossier `/var/www/data` pour la base de données

------------------------------------------------------------------------

## docker-compose.yml

Ce fichier lance deux services.

### php-site

-   Construit l'image à partir du Dockerfile
-   Exposé sur le port 8080
-   Monte :
    -   `./site-php/public` → `/var/www/html`
    -   `./site-php/data` → `/var/www/data`

### html-site

-   Utilise Nginx
-   Exposé sur le port 8081
-   Monte `./site-html` en lecture seule

------------------------------------------------------------------------

# 5. Dossier site-html/

## Structure

    site-html/
    ├── CSS/
    ├── JS/
    ├── HTML/
    ├── api/
    ├── data/
    └── media/

------------------------------------------------------------------------

## CSS/style.css

Contient la mise en page générale du site :

-   Navbar
-   Boutons
-   Formulaires
-   Responsive design

------------------------------------------------------------------------

## JS/script.js

Fichier principal côté client.

Il :

-   Récupère les valeurs des formulaires
-   Effectue les calculs (IMC, calories, protéines, etc.)
-   Affiche les résultats dynamiquement
-   Appelle `saveLog()` pour enregistrer les données

------------------------------------------------------------------------

## JS/api_logger.js

Permet d'envoyer les données vers l'API.

Fonction principale :

    window.saveLog(payload)

Elle envoie une requête POST vers :

    /api/log_create.php

Les données sont envoyées au format JSON.

------------------------------------------------------------------------

## site-html/api/db.php (Explication détaillée)

C'est un fichier très important.

Son rôle est de créer une connexion à la base SQLite.

Il contient une fonction :

    function db()

Cette fonction :

1.  Récupère le dossier courant avec `__DIR__`
2.  Construit le chemin vers `../data/nutrithub.sqlite`
3.  Crée une connexion PDO avec : new PDO('sqlite:' . \$path)
4.  Active le mode erreur exception : PDO::ATTR_ERRMODE =\>
    PDO::ERRMODE_EXCEPTION
5.  Définit le mode de récupération associatif :
    PDO::ATTR_DEFAULT_FETCH_MODE =\> PDO::FETCH_ASSOC
6.  Retourne l'objet PDO

Tous les fichiers API utilisent cette fonction pour accéder à la base.

------------------------------------------------------------------------

## site-html/api/log_create.php

Endpoint appelé en POST.

Il :

-   Vérifie que la méthode est POST
-   Lit les données JSON envoyées
-   Insère les informations dans la table `log`
-   Retourne une réponse JSON `{ ok: true }`

------------------------------------------------------------------------

## site-html/api/log_latest.php

Endpoint appelé en GET.

Il :

-   Récupère le dernier log enregistré
-   Peut filtrer par type
-   Retourne les données en JSON

------------------------------------------------------------------------

# 6. Dossier site-php/

Version plus structurée du site.

## public/includes/

### header.php

Contient :

-   Le début du HTML
-   Le head
-   La navbar

Permet d'éviter la duplication de code.

### footer.php

Contient la fin du HTML et les scripts communs.

------------------------------------------------------------------------

## public/api/db.php

Même principe que dans site-html, mais le chemin vers la base est :

    /var/www/data/nutrithub.sqlite

Ce chemin correspond au dossier monté dans Docker.

------------------------------------------------------------------------

## public/admin_db.php

Interface simple pour visualiser la base SQLite.

Accessible via :

    http://localhost:8080/admin_db.php?key=nutrithub

Permet :

-   Voir les tables
-   Exécuter des requêtes SELECT
-   Afficher les données

------------------------------------------------------------------------

# 7. Base de données

La base utilisée est SQLite.

Fichier :

    nutrithub.sqlite

Le schéma est défini dans :

    schema.sql

Table principale : `log`

Elle contient :

-   type
-   sexe
-   poids
-   taille
-   age
-   inputs_json
-   results_json
-   created_at

------------------------------------------------------------------------

# 8. Conclusion

Ce projet montre :

-   L'utilisation de HTML, CSS et JavaScript
-   La communication avec une API PHP
-   L'utilisation de SQLite avec PDO
-   La containerisation avec Docker

Le fichier `db.php` est essentiel car il centralise la connexion à la
base de données, ce qui rend le projet plus propre et plus maintenable.

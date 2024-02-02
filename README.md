# Application Web en PHP

## Description
Cette application Web en PHP permet aux utilisateurs de s'authentifier et de gérer divers objets liés à la gestion des 
cours et des horaires. Elle offre des fonctionnalités pour créer, modifier et supprimer les éléments suivants :

- Enseignants : Vous pouvez ajouter, modifier et supprimer des informations sur les enseignants de l'établissement.
- Groupes de cours : Créez des groupes de cours avec un numéro de groupe et un nombre d'étudiants associés.
- Horaires : Gérez les horaires en définissant les blocs horaires pour chaque jour de la semaine.
- Cheminements : Créez des cheminements ou des parcours d'études pour les étudiants avec des informations sur les sessions.
- Cours : Ajoutez des cours avec un code, un nom et une pondération.
- Contraintes d'horaires : Associez des contraintes d'horaires spécifiques à des cours, des groupes de cours ou des cheminements.

## Fonctionnalités clés
- Authentification : Les utilisateurs peuvent s'authentifier pour accéder aux fonctionnalités de l'application.
- CRUD (Create, Read, Update, Delete) : Les utilisateurs peuvent créer, lire, mettre à jour et supprimer les objets mentionnés ci-dessus.
- Gestion des associations : Les objets peuvent être associés les uns aux autres, par exemple, associer des enseignants à des cours ou des contraintes d'horaires à des groupes de cours.

## Installation
1. Clonez le dépôt GitHub de l'application.
2. Configurez votre environnement de développement PHP et votre serveur Web. ``npm run dev``
3. Importez la base de données fournie dans le système de gestion de base de données de votre choix. ``php artisan migrate --seed``
4. Configurez les informations de connexion à la base de données dans le fichier de configuration de l'application. ``php artisan serve``
5. Lancez l'application en accédant à l'URL correspondante.

## Prérequis
- PHP 7.0 ou version ultérieure
- Serveur Web (Apache, Nginx, etc.)
- Système de gestion de base de données (MySQL, PostgreSQL, etc.)

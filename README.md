# RoyalRide - Site de Location de Voitures de Luxe

**RoyalRide** est un site de location de voitures de luxe destiné à offrir une expérience haut de gamme à ses utilisateurs. Ce service permet à ses clients de louer des voitures prestigieuses pour des occasions spéciales, des événements privés ou des voyages inoubliables. Avec une interface élégante et une expérience utilisateur fluide, **RoyalRide** facilite la réservation de voitures de luxe tout en offrant des options personnalisables pour répondre aux besoins de chacun.

## Table des matières

1. [Description du projet](#description-du-projet)
2. [Fonctionnalités principales](#fonctionnalités-principales)
3. [Technologies utilisées](#technologies-utilisées)
4. [Installation](#installation)
5. [Structure du projet](#structure-du-projet)
6. [Contribution](#contribution)
7. [Licences](#licences)

---

## Description du projet

**RoyalRide** est un site de location de voitures de luxe qui permet aux utilisateurs de réserver des véhicules haut de gamme pour des périodes flexibles. L'application offre une interface simple et élégante, permettant aux clients de rechercher, réserver et gérer leurs locations en ligne. Le site inclut des options de personnalisation, telles que l'assurance, le nettoyage de véhicule ou la possibilité de voyager avec des animaux. De plus, les administrateurs peuvent facilement gérer les voitures, les utilisateurs et les réservations.

L'interface du site est **responsive**, assurant une navigation optimale sur tous les types de dispositifs, des ordinateurs de bureau aux smartphones.

## Fonctionnalités principales

- **Page d'accueil élégante et moderne** : Affichage des véhicules disponibles à la location avec des informations clés.
- **Connexion utilisateur et gestion de compte** : Inscription, connexion et gestion des informations personnelles.
- **Réservation de véhicules** : Réservation facile de voitures en fonction des dates et de la disponibilité.
- **Options personnalisables** : Sélection d'options comme l'assurance, le nettoyage ou l'option pour animaux.
- **Calendrier de réservation interactif** : Permet de vérifier la disponibilité des véhicules en fonction des dates choisies.
- **Historique des réservations** : Accès à l'historique des réservations pour les utilisateurs connectés.
- **Panneau d'administration** : Gestion des véhicules, des utilisateurs et des réservations pour les administrateurs.
- **Responsive Design** : Site adaptatif, conçu pour une utilisation fluide sur tous les types de dispositifs.

## Technologies utilisées

- **Frontend** :  
  - HTML5, CSS3, JavaScript
  - Framework CSS : Bootstrap
  - JavaScript : jQuery (optionnel pour des interactions dynamiques)
  
- **Backend** :  
  - PHP 7.x ou plus
  - Base de données : MySQL 
  - PDO 

- **Outils de développement** :
  - Git pour la gestion de version
  - IDE/éditeur recommandé : Visual Studio Code, Sublime Text, ou tout autre éditeur de code

## Installation

1. **Clonez le dépôt Git** :
   ```bash
   git clone https://github.com/jasnael94/royalride.git
   ```
   
2. **Configurez la base de données** :
   - Créez une base de données MySQL nommée `royal_ride` (ou le nom de votre choix).
   - Importez le fichier SQL pour créer les tables nécessaires (disponible dans le dossier `database`).

3. **Configurer les informations de connexion à la base de données** :
   - Ouvrez `includes/db.php` et modifiez les informations de connexion pour correspondre à votre configuration locale :
     ```php
     $host = 'localhost'; // ou autre si nécessaire
     $dbname = 'royal_ride';
     $username = 'root'; // votre nom d'utilisateur
     $password = ''; // votre mot de passe
     ```

4. **Lancez le serveur** :
   - Si vous utilisez un serveur local comme XAMPP, MAMP ou WAMP, placez les fichiers dans le répertoire `htdocs` (pour XAMPP) ou le répertoire de votre choix pour les autres outils.
   - Accédez au projet via votre navigateur en allant sur `http://localhost/royalride`.

5. **Testez les fonctionnalités** : Inscrivez-vous et essayez de réserver un véhicule pour tester l'interface.

## Structure du projet

```
/royalride
    /assets
        /css
            - style.css
        /js
            - script.js
    /includes
        - db.php
        - header.php
        - footer.php
    /pages
        - index.php
        - login.php
        - reservation.php
        - historique.php
        - admin.php
    - config.php
    - .htaccess
```

- **/assets** : Contient les fichiers CSS et JS nécessaires au bon fonctionnement du site.
- **/includes** : Contient des fichiers de configuration, tels que `db.php` pour la connexion à la base de données, ainsi que les fichiers header et footer communs.
- **/pages** : Contient les pages principales du site (accueil, connexion, réservation, historique, administration).
- **config.php** : Fichier de configuration du projet (optionnel).
- **.htaccess** : Configuration du serveur pour le routage et la gestion des URL.

## Contribution

Les contributions sont les bienvenues pour améliorer ce projet. Vous pouvez aider à :
- Ajouter de nouvelles fonctionnalités
- Corriger des bugs ou des problèmes de sécurité
- Améliorer le design ou l'interface utilisateur

Pour contribuer :
1. Forkez le projet
2. Créez une nouvelle branche pour votre fonctionnalité : `git checkout -b feature/ma-nouvelle-fonctionnalité`
3. Committez vos changements : `git commit -am 'Ajout de nouvelle fonctionnalité'`
4. Poussez la branche : `git push origin feature/ma-nouvelle-fonctionnalité`
5. Ouvrez une Pull Request

## Licences

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT). Vous pouvez librement utiliser, modifier et distribuer ce code, sous réserve de respecter les termes de la licence.

---

### Auteurs

- **Denis** : Développeur principal
- **Cali** : Concepteur et Développeur Frontend
- **Jason** : Responsable Backend et Administration

---

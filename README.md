# GameNexus

GameNexus est un site e-commerce de vente de jeux vidéo où les utilisateurs peuvent acheter des jeux, recevoir des codes d'activation et des factures PDF, et gérer leurs achats et leur compte en ligne.

## Table des Matières
- [Introduction](#introduction)
- [Fonctionnalités](#fonctionnalités)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Espace Administration](#espace-administration)
- [Contact](#contact)

## Introduction

### Description
GameNexus est une plateforme en ligne où les utilisateurs peuvent acheter des jeux vidéo pour différentes plateformes (PC, Xbox, PlayStation, etc.). Lorsqu'un utilisateur achète un jeu, il reçoit une facture contenant les codes d'activation des jeux en PDF. Les utilisateurs peuvent également consulter leurs factures dans leur espace membre. L'administration du site permet de gérer les jeux en vente et les informations des membres.

### Technologies Utilisées
- **Frontend** : HTML / CSS / JavaScript
- **Backend** : PHP
- **Base de données** : PhpMyAdmin
- **Authentification** : PHP 
- **Génération de PDF** : dompdf
- **Déploiement** : XAMPP

## Fonctionnalités
- **Achat de jeux vidéo** : Les utilisateurs peuvent acheter des jeux s'ils ont un solde suffisant et que le stock est disponible.
- **Téléchargement de pdf** : Téléchargement automatique d'un pdf avec les codes d'activation et la facture après un achat.
- **Espace membre** : Consultation des factures et gestion du compte utilisateur.
- **Espace administration** : Gestion des jeux en vente et des informations des membres.

## Installation
1. Clonez le dépôt
    ```bash
    git clone https://github.com/lucille452/Projet_web.git
    ```
2. Installez le paquet dompdf
    ```bash
   mkdir Dompdf && cd Dompdf && composer require dompdf/dompdf 
   ```
3. Installez xampp et 
    importez le fichier gamenexus.sql dans phpmyadmin
4. Démarrez le projet
   L'application sera accessible à l'adresse http://localhost/Projet_web/Front/Templates/Global_page/connexion.php.

## Utilisation

### Interface Utilisateur
- **Acheter un jeu** : Sélectionnez un jeu, vérifiez votre solde et le stock disponible, et procédez à l'achat.
- **Mettre un avis** : Mettez un ou plusieurs avis et une note pour les jeux que vous souhaitez.
- **Recevoir le code d'activation** : Après l'achat, recevez un pdf avec les codes d'activation des jeux et la facture.
- **Consulter les factures** : Accédez à votre espace membre pour consulter et télécharger vos factures.

## Espace Administration
L'espace administration permet de :
- **Gérer les jeux en vente** : Ajouter, modifier ou supprimer des jeux, gérer les stocks.
- **Gérer les membres** : Consulter et modifier les informations des membres, gérer les soldes des comptes.

## Contact
Pour toute question, veuillez contacter :

**Nom** : CENAC Lucille ou BRUN Sasha
**Email** : [lucille.cenac@ynov.com] ou [sasha.brun@ynov.com]

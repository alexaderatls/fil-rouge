# 1\. Informations générales

## 1.1 Page de garde

* **Titre du projet** : Application de gestion d'interventions
* **Date** :20/03/2026
* **Version** : 1.0
* **Auteurs** :Adera Alex, Coulon Max







# 2\. Introduction

## 2.1 Résumé exécutif

Ce projet consiste à concevoir et développer un applicatif métier permettant à une petite entreprise de gérer ses clients,
ses techniciens, son matériel ainsi que ses interventions.
L'application devra donc faciliter la planification de ces dernières,
ainsi que respecter un développement avec Symfony.




## 2.2 Contexte et objectifs

Une entreprise de maintenance doit organiser efficacement ses interventions chez ses clients.
La gestion manuelle ou dispersée des informations peut entraîner des erreurs et une perte de temps.

Objectifs :

* Centraliser toutes les données(Listes)
* Automatiser la gestion des interventions
* Suivre l'état d'avancement des interventions
* Gérer le stock de matériel en temps réel
* Générer des rapports professionnels(PDF)




## 2.3 Périmètre du projet

Inclus :

* Tableau de bord
* Gestion des clients
* Gestion des techniciens
* Gestion du matériel(stock)
* Gestion des interventions
* Génération de rapports PDF

Exclus :

* Facturation
* Gestion comptable
* Application mobile







# 3\. Spécifications

## 3.1 Besoins fonctionnels

### Gestion des clients

* Ajouter, modifier et supprimer un client
* Stocker les informations :

  - Nom
  - Prénom
  - Adresse
  - Ville
  - Téléphone
  - Email
* Afficher la liste des clients + Recherche simplifiée

### Gestion des techniciens

* Ajouter, modifier et supprimer un technicien
* Informations :

  - Nom
  - Prénom
  - Email
  - Matricule
  - Compétences(optionnel)
* Consulter la liste des techniciens

### Gestion du matériel(stock)

* Ajouter, modifier et supprimer un matériel
* Informations :

  - Nom
  - Référence
  - Quantité en stock
  - Prix unitaire
* Consulter la liste du stock
* Mise à jour automatique du stock lors des interventions

### Gestion des interventions

* Créer une intervention avec :

  - Client associé
  - Technicien assigné
  - Date et heure
  - Statut(Planned, In progress, Completed, Canceled)
  - Description du problème
* Modifier une intervention
* Supprimer une intervention
* Consulter l'historique des interventions d'un client

### Gestion du matériel utilisé

* Associer un ou plusieurs matériels à une intervention
* Spécifier la quantité utilisée
* Vérifier la disponibilité du stock avant validation

### Tableau de bord

* Afficher les interventions du jour
* Afficher la répartition des interventions par statut
* Afficher les alertes de stock faible(optionnel)

### Génération de PDF

* Générer un rapport pour chaque intervention terminée contenant :

  - Informations client
  - Informations technicien
  - Description
  - Matériel utilisé
  - Date et statut




# 3.2 Contraintes techniques et organisationnelles

### Contraintes techniques

* Développement avec Symfony 7+
* Base de données sur MySQL/MariaDB
* Utilisation de Doctrine pour ORM(Object-Relational Mapping)
* Vues/Affichage utilisant Twig
* Bootstrap comme CSS

### Contraintes organisationnelles

* Respect des délais du projet
* Utilisation de Git pour le versioning
* Travail structuré et documenté via un README clair







# 4\. Contraintes et validation

## 4.1 Ergonomie et design

* Interface claire et intuitive
* Navigation simple
* Tableaux lisibles cohérents
* Formulaires ergonomiques propres

## 4.2 Planning prévisionnel

* Fait : Besoin, Étude métier
* Semaine 1 : Cahier des charges, Analyse fonctionnelle(QUOI), Analyse technique(COMMENT) 
* Semaine 2-5 : Développement
* Semaine 6 : Finalisation, Test, Mise en production, Maintenance

## 4.3 Critères de validation

* Toutes les fonctionnalités sont opérationnelles
* Le stock est correctement mis à jour
* Aucune erreur(critique) lors de l'utilisation
* Génération de PDF sur demande
* Interface logique et facile d'utilisation

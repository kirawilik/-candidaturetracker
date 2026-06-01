# 📌 CandidatureTracker (Laravel)

CandidatureTracker est une application web développée avec Laravel permettant de suivre et organiser efficacement ses candidatures d'emploi.

L’objectif est de centraliser toutes les opportunités professionnelles afin de simplifier la gestion des candidatures, des entretiens et du suivi des recruteurs.

---

## 🚀 Contexte du projet

La recherche d’emploi pour un jeune diplômé peut rapidement devenir difficile à gérer : nombreuses candidatures, entretiens multiples, relances oubliées et perte de visibilité.

Aujourd’hui, ces informations sont souvent dispersées (notes, fichiers, Excel), ce qui entraîne :
- oublis de relances importantes
- manque de suivi des entretiens
- difficulté à visualiser l’avancement global

👉 CandidatureTracker répond à ce problème en structurant le processus de recherche d’emploi.

---

## 🎯 Objectif

Développer une application Laravel permettant :

- d’enregistrer chaque candidature
- de suivre son évolution (statut, priorité, notes)
- de gérer les entretiens associés
- d’archiver les candidatures terminées
- de conserver un historique complet des opportunités

---

## ✨ Fonctionnalités (User Stories)

### 🔐 Authentification
- **US1** : Inscription, connexion et déconnexion des utilisateurs

---

### 📄 Gestion des candidatures
- **US2** : Liste des candidatures actives
- **US3** : Création d’une candidature :
  - entreprise
  - poste
  - URL de l’offre (optionnel)
  - statut
  - priorité
  - notes
  - date de candidature
- **US4** : Consultation du détail d’une candidature
- **US5** : Modification d’une candidature
- **US6** : Archivage d’une candidature (sans suppression)
- **US7** : Page des candidatures archivées
- **US8** : Restauration d’une candidature archivée

---

### 🔎 Filtres
- **US9** : Filtrer les candidatures par :
  - statut
  - priorité

---

### 🗓️ Gestion des entretiens
- **US10** : Ajouter un entretien à une candidature :
  - type d’entretien
  - date et heure
  - notes de préparation (optionnel)
  - résultat
- **US11** : Modifier ou supprimer un entretien

---

## 🧱 Stack technique

- Laravel (PHP Framework)
- MySQL / MariaDB
- Blade (templates)
- Bootstrap / Tailwind CSS (selon ton choix)
- Laravel Breeze / Jetstream (auth)

---

## 📊 Structure globale

- Users → candidatures → entretiens
- Système d’archivage (soft delete ou champ `archived`)
- Filtrage dynamique des candidatures

---

## 🛠️ Installation (exemple)

```bash
git clone https://github.com/username/candidature-tracker.git
cd candidature-tracker
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
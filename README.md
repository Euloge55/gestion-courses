# 🛒 Gestion des Courses Familiales (Laravel MVC)

## 📌 Description
Cette application web permet à une famille de gérer ses courses quotidiennes.
Elle remplace le carnet papier en offrant :
- un suivi détaillé des achats
- un historique des dépenses
- une analyse des produits les plus consommés
- un bilan financier global

L’application est développée avec **Laravel** en respectant l’architecture **MVC (Model – View – Controller)**.

---

## 🎯 Objectifs du projet
- Savoir où part l’argent
- Identifier les produits les plus consommés
- Faciliter le suivi des dépenses familiales
- Appliquer les bonnes pratiques MVC avec Laravel

---

## ⚙️ Fonctionnalités

### 1️⃣ Ajout d’un achat
- Formulaire d’ajout d’achat avec :
  - Nom du produit
  - Prix
  - Date d’achat

### 2️⃣ Historique des achats
- Affichage de la liste des courses
- Tri par date (du plus récent au plus ancien)

### 3️⃣ Analyse – Top Produit
- Calcul du produit le plus acheté
- Analyse basée sur le **nombre d’occurrences** (pas le montant)

### 4️⃣ Bilan financier
- Calcul et affichage du montant total des dépenses
- Basé sur la liste affichée

---

## 🧱 Architecture MVC
- **Model** : Gestion des données (Achats)
- **View** : Interfaces utilisateur (Blade)
- **Controller** : Logique métier et traitement des données

---

## 🛠️ Technologies utilisées
- PHP 8+
- Laravel
- MySQL
- HTML / CSS
- Blade Template

---

## 🚀 Installation du projet

1. Cloner le projet :
```bash
git clone https://github.com/votre-utilisateur/gestion-courses.git

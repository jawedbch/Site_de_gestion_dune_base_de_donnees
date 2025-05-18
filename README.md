# ☕ Projet Web – Gestion des Capsules, Magasins et Stocks

Projet réalisé dans le cadre du cours **InfoWeb** à l’Université du Havre.  
Cette application web permet de gérer une base de données contenant des **capsules de café**, des **magasins**, et leurs **stocks**, via une interface simple en PHP.

---

## 👨‍💻 Auteur

**Baouche Mohamed Djaouad**  

---

## 📦 Fonctionnalités principales

- Consultation des capsules, magasins, ou stocks
- Insertion de nouvelles entrées dans chaque table via des formulaires
- Suppression directe d'enregistrements
- Navigation intuitive entre les pages
- Interface utilisateur stylisée avec CSS

---

## 🧩 Base de données utilisée

Le projet repose sur une base PostgreSQL avec trois tables principales :

### `g11_capsule`
- `cap_id` *(INT, PRIMARY KEY)* : identifiant de la capsule  
- `cap_nom` *(VARCHAR)* : nom de la capsule  
- `cap_prix` *(FLOAT)* : prix unitaire  
- `cap_intensite` *(INT)* : intensité du café  

### `g11_magasins`
- `mag_id` *(INT, PRIMARY KEY)* : identifiant du magasin  
- `mag_nom` *(VARCHAR)* : nom du magasin  
- `mag_adresse` *(VARCHAR)* : adresse  

### `g11_stocke`
- `mag_id` *(INT, FOREIGN KEY)* : identifiant du magasin  
- `cap_id` *(INT, FOREIGN KEY)* : identifiant de la capsule  
- `stock_quantite` *(INT)* : quantité en stock  

---

## 🌐 Structure du site web

### Connexion à la base de données
- `db_connection.php`
- Configuration de la connexion à la base de données
  
### Page d'accueil 
- `index.php`
- Page d’accueil
- Menu déroulant pour choisir la table à consulter
- Redirection via bouton "Consulter"

### Choix de la table
- `redirectAfficheTable.php`
- Redirige vers la bonne page d’affichage (capsules, magasins ou stocks)
- Stocke le choix dans une variable de session

### Pages d’affichage
- `afficheCapsules.php`, `afficheMagasins.php`, `afficheStock.php`
- Affichage de la table sélectionnée
- Boutons fixes : **Accueil**, **Retour**, **Insértion**, **Detail**, **Modifier**, **Supprimer**

### Affichage des détails d'un enregistrement
- `detailsCapsules.php`, `detailsMagasins.php`, `detailsStock.php`
- Afficher les détails de l'enregistrement choisi par l'utilisateur

### Formulaires d'insertion et modification
- `insertion_capsule.php`, `insertion_magasin.php`, `insertion_stock.php`
- `ModifierFormulaire.php` (pour chaque table séparément) 
- Menus déroulants et champs de saisie
- Boutons : **Insérer**, **Modifier** et **Effacer**

### Scripts d’insertion et modification
- `inserer_capsule.php`, `inserer_magasin.php`, `inserer_stock.php`
- `ModifierCap.php`, `modifierMag.php`, `modifierStock.php`
- Validation des données
- Insertion en base de données
- Redirection vers la page d’affichage
- Message d’erreur en cas d’échec

### Suppression
`supprimerCapsule.php`, `supprimerMagasin.php`, `supprimerStock.php`
- Bouton "Supprimer" à côté de chaque ligne
- Suppression directe sans confirmation
- Redirection automatique vers la table mise à jour

---

## 🎨 Esthétique et CSS

- Fond dégradé, pas d’image
- Tableaux sombres avec contraste fort
- Boutons stylisés avec transitions douces
- Boutons fixes en haut à gauche

---

## 🚀 Accès au projet

- Le site était hébergé en local via un serveur PHP : http://172.16.20.14/bm223414/ProjetWeb/etape2/

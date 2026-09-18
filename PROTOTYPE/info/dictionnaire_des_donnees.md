# Dictionnaire des Données - MonResto

Ce document décrit de manière exhaustive chaque champ (donnée) présent dans la base de données **MonResto**.

---

| Nom du Champ | Table(s) d'appartenance | Type SQL | Rôle / Description |
| :--- | :--- | :--- | :--- |
| **id_categorie** | Categorie, Produit | `INT` (Auto-increment) | Identifiant unique de la catégorie. |
| **nom** (catégorie) | Categorie | `VARCHAR(50)` | Libellé ou nom de la catégorie (ex: Burgers). |
| **id_produit** | Produit, LigneCommande | `INT` (Auto-increment) | Identifiant unique du produit (plat/boisson). |
| **nom** (produit) | Produit | `VARCHAR(100)` | Nom du produit commercialisé. |
| **description** | Produit | `TEXT` | Description détaillée des ingrédients ou du produit. |
| **prix** | Produit | `DECIMAL(10,2)` | Prix unitaire standard du produit. |
| **disponible** | Produit | `BOOLEAN` | Indique si le produit est en stock/disponible (`TRUE`/`FALSE`). |
| **id_client** | Client, Commande | `INT` (Auto-increment) | Identifiant unique du client. |
| **nom** (client) | Client | `VARCHAR(100)` | Nom et prénom du client. |
| **telephone** | Client | `VARCHAR(20)` | Numéro de téléphone de contact du client. |
| **adresse** | Client | `TEXT` | Adresse postale de livraison du client. |
| **id_commande** | Commande, LigneCommande | `INT` (Auto-increment) | Identifiant unique de la commande. |
| **date_heure** | Commande | `DATETIME` | Date et heure exactes de la création de la commande. |
| **statut** | Commande | `VARCHAR(50)` | État d'avancement de la commande (ex: En cours, Livrée). |
| **type_commande** | Commande | `VARCHAR(50)` | Mode de commande (ex: À emporter, Sur place, Livraison). |
| **temps_estime** | Commande | `INT` | Temps de préparation estimé en minutes. |
| **quantite** | LigneCommande | `INT` | Quantité commandée pour un produit spécifique. |
| **prix_unitaire** | LigneCommande | `DECIMAL(10,2)` | Prix unitaire figé du produit au moment de la commande. |
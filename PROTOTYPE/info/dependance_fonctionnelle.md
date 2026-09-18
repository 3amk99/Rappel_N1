# Dépendances Fonctionnelles (DF) - MonResto

Ce document répertorie l'ensemble des Dépendances Fonctionnelles (DF) extraites de la base de données **MonResto**, permettant de valider la normalisation (jusqu'à la 3NF).

---

## 1. Liste des Dépendances Fonctionnelles par Entité

### A. Table Categorie
* `id_categorie` $\rightarrow$ `nom`
  * *Explication :* Connaissant l'identifiant de la catégorie, on détermine son nom unique.

### B. Table Produit
* `id_produit` $\rightarrow$ `nom`, `description`, `prix`, `disponible`, `id_categorie`
  * *Explication :* Un identifiant de produit détermine toutes ses caractéristiques ainsi que sa catégorie d'appartenance.

### C. Table Client
* `id_client` $\rightarrow$ `nom`, `telephone`, `adresse`
  * *Explication :* L'identifiant du client détermine ses informations personnelles.

### D. Table Commande
* `id_commande` $\rightarrow$ `date_heure`, `statut`, `type_commande`, `temps_estime`, `id_client`
  * *Explication :* L'identifiant de la commande détermine sa date, son statut, son type, son temps estimé et le client qui l'a passée.

### E. Table LigneCommande (Table d'association)
* `id_commande, id_produit` $\rightarrow$ `quantite`, `prix_unitaire`
  * *Explication :* La combinaison d'une commande et d'un produit détermine la quantité commandée et le prix unitaire du produit au moment de la commande.

---

## 2. Vérification de la Normalisation
* **1FN (Première Forme Normale) :** Tous les attributs contiennent des valeurs atomiques (pas de tableaux ou listes imbriquées).
* **2FN (Deuxième Forme Normale) :** En 1FN et tous les attributs non-clés dépendent entièrement de la clé primaire.
* **3FN (Troisième Forme Normale) :** En 2FN et il n'y a pas de dépendance transitive entre attributs non-clés.

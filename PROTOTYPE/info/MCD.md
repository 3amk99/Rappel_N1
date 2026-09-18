# Modèle Conceptuel de Données (MCD) - MonResto

Ce document présente le Modèle Conceptuel de Données (MCD) pour l'application **MonResto**, basé sur la structure SQL fournie.

---

## 1. Diagramme / Représentation Textuelle du MCD

```text
[ CATEGORIE ] 1-----N [ PRODUIT ]
                         |
                         | (contient)
                         N
                      [ LIGNE_COMMANDE ] N
                                         |
                                         | (concerne)
                                         1
[ CLIENT ] 1------------------------N [ COMMANDE ]
```

---

## 2. Entités et Associations (Description)

### Entités :
1. **CATEGORIE**
   - **Identifiant :** `id_categorie`
   - **Attributs :** `nom`

2. **PRODUIT**
   - **Identifiant :** `id_produit`
   - **Attributs :** `nom`, `description`, `prix`, `disponible`

3. **CLIENT**
   - **Identifiant :** `id_client`
   - **Attributs :** `nom`, `telephone`, `adresse`

4. **COMMANDE**
   - **Identifiant :** `id_commande`
   - **Attributs :** `date_heure`, `statut`, `type_commande`, `temps_estime`

5. **LIGNE_COMMANDE** (Table d'association avec données portées)
   - **Identifiant Composé :** (`id_commande`, `id_produit`)
   - **Attributs :** `quantite`, `prix_unitaire`

### Associations :
* **APPARTIENT** : Une *Categorie* contient un ou plusieurs *Produits* (1,N), et un *Produit* appartient à une et une seule *Categorie* (1,1).
* **PASSE** : Un *Client* passe zéro ou plusieurs *Commandes* (0,N ou 1,N), et une *Commande* est passée par un et un seul *Client* (1,1).
* **CONCERNE / CONTIENT** : Une *Commande* concerne un ou plusieurs *Produits* via les *Lignes de Commande* (1,N), et un *Produit* peut apparaître dans zéro ou plusieurs *Lignes de Commande* (0,N).
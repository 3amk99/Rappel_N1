# Dictionnaire de Données - Réseau Social Professionnel

## 1. Table Membre

| Champ (Attribut) | Description | Type / Format | Longueur | Clé (Key) |
| :--- | :--- | :--- | :--- | :--- |
| id_membre | Identifiant unique du membre | INT | 11 | Clé Primaire (PK) |
| nom_membre | Nom complet du membre | VARCHAR | 50 | - |

---

## 2. Table Domaine

| Champ (Attribut) | Description | Type / Format | Longueur | Clé (Key) |
| :--- | :--- | :--- | :--- | :--- |
| id_domaine | Identifiant unique du domaine/secteur | INT | 11 | Clé Primaire (PK) |
| libelle_domaine | Nom du domaine (ex: IT, Finance) | VARCHAR | 50 | - |

---

## 3. Table Entreprise

| Champ (Attribut) | Description | Type / Format | Longueur | Clé (Key) |
| :--- | :--- | :--- | :--- | :--- |
| id_entreprise | Identifiant unique de l'entreprise | INT | 11 | Clé Primaire (PK) |
| nom_entreprise | Nom de l'entreprise | VARCHAR | 100 | - |

---

## 4. Table Publication

| Champ (Attribut) | Description | Type / Format | Longueur | Clé (Key) |
| :--- | :--- | :--- | :--- | :--- |
| id_publication | Identifiant unique de la publication | INT | 11 | Clé Primaire (PK) |
| titre_pub | Titre de la publication | VARCHAR | 150 | - |
| contenu_pub | Contenu textuel de la publication | TEXT | - | - |
| date_pub | Date et heure de création | DATETIME | - | - |
| membre_id | Clé étrangère vers le membre (auteur) | INT | 11 | Clé Étrangère (FK) |
| domaine_id | Clé étrangère vers le domaine | INT | 11 | Clé Étrangère (FK) |
| entreprise_id | Clé étrangère vers l'entreprise | INT | 11 | Clé Étrangère (FK) |
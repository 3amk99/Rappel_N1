CREATE DATABASE MonResto;
USE MonResto;

CREATE TABLE Categorie (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE Produit (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
    disponible BOOLEAN DEFAULT TRUE,
    id_categorie INT NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id_categorie)
);

CREATE TABLE Client (
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    adresse TEXT
);

CREATE TABLE Commande (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    date_heure DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR(50) NOT NULL,
    type_commande VARCHAR(50) NOT NULL, 
    temps_estime INT, 
    id_client INT NOT NULL,
    FOREIGN KEY (id_client) REFERENCES Client(id_client)
);

CREATE TABLE LigneCommande (
    id_commande INT,
    id_produit INT,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_commande, id_produit),
    FOREIGN KEY (id_commande) REFERENCES Commande(id_commande),
    FOREIGN KEY (id_produit) REFERENCES Produit(id_produit)
);




INSERT INTO Categorie (id_categorie, nom)
VALUES 
(1, 'Burgers'),
(2, 'Boissons');

INSERT INTO Produit 
(
 id_produit,
 nom,
 description,
 prix,
 disponible,
 id_categorie
)
VALUES 
(1, 'Cheeseburger', 'Steak, cheddar, sauce maison', 10.00, 1, 1),
(2, 'Coca-Cola', 'Canette 33cl', 3.00, 1, 2);

INSERT INTO Client 
(
 id_client,
 nom,
 telephone,
 adresse
)
 VALUES 
(1, 'Jean Dupont', '0612345678', '15 Rue de Paris');
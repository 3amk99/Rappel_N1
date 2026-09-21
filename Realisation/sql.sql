CREATE DATABASE IF NOT EXISTS reseau_social_db;
USE reseau_social_db;

CREATE TABLE membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom_membre VARCHAR(50) NOT NULL
);

CREATE TABLE domaine (
    id_domaine INT AUTO_INCREMENT PRIMARY KEY,
    libelle_domaine VARCHAR(50) NOT NULL
);

CREATE TABLE entreprise (
    id_entreprise INT AUTO_INCREMENT PRIMARY KEY,
    nom_entreprise VARCHAR(100) NOT NULL
);

CREATE TABLE publication (
    id_publication INT AUTO_INCREMENT PRIMARY KEY,
    titre_pub VARCHAR(150) NOT NULL,
    contenu_pub TEXT NOT NULL,
    date_pub DATETIME DEFAULT CURRENT_TIMESTAMP,
    membre_id INT,
    domaine_id INT,
    entreprise_id INT,
    FOREIGN KEY (membre_id) REFERENCES membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (domaine_id) REFERENCES domaine(id_domaine) ON DELETE CASCADE,
    FOREIGN KEY (entreprise_id) REFERENCES entreprise(id_entreprise) ON DELETE CASCADE
);

-- Insert dummy data so your dropdowns work immediately
INSERT INTO membre (nom_membre) VALUES ('Badreddine Hammam'), ('Sara Alami');
INSERT INTO domaine (libelle_domaine) VALUES ('IT / Software'), ('Marketing');
INSERT INTO entreprise (nom_entreprise) VALUES ('TechCorp'), ('Global Media');
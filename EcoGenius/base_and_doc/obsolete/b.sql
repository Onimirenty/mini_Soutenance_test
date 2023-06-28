CREATE TABLE mouvement (
    idMouvement INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);
CREATE TABLE historiqueMatierePremiere (
    idHistoriqueMatiere INT AUTO_INCREMENT PRIMARY KEY,
    idMatierePremiere INT NOT NULL,
    date DATE NOT NULL,
    quantite INT NOT NULL,
    idMouvement INT NOT NULL,
    FOREIGN KEY (idMatierePremiere) REFERENCES matierePremiere(idMatierePremiere),
    FOREIGN KEY (idMouvement) REFERENCES mouvement(idMouvement)
);
CREATE TABLE historiqueSousCategorieProduit (
    idHistoriqueSousCategorie INT AUTO_INCREMENT PRIMARY KEY,
    idSousCategorieProduit INT NOT NULL,
    date DATE NOT NULL,
    quantite INT NOT NULL,
    idMouvement INT NOT NULL,
    FOREIGN KEY (idSousCategorieProduit) REFERENCES sousCategorieProduit(idSousCategorieProduit),
    FOREIGN KEY (idMouvement) REFERENCES mouvement(idMouvement)
);

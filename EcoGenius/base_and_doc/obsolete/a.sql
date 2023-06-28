
CREATE TABLE mouvement(
    idMouvement SERIAL PRIMARY KEY,
    nom VARCHAR
);
CREATE TABLE historiqueMatierePremiere(
    idHistoriqueMatiere  SERIAL PRIMARY KEY,
    idMatierePremiere INTEGER NOT NULL REFERENCES matierePremiere(idMatierePremiere),
    date Date,
    quantite INTEGER,
    idMouvement INTEGER NOT NULL REFERENCES mouvement(idMouvement)
);

CREATE TABLE historiqueSousCategorieProduit(
    idHistoriqueMatiere  SERIAL PRIMARY KEY,
    idSousCategorieProduit INTEGER NOT NULL REFERENCES sousCategorieProduit(idSousCategorieProduit),
    date Date,
    quantite INTEGER,
    idMouvement INTEGER NOT NULL REFERENCES mouvement(idMouvement)
);

INSERT INTO mouvement(nom) Values('Sortie'),('Entree');
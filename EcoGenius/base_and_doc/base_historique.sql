-- table sexe
CREATE TABLE sexe (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(10) NOT NULL
);


-- table client
CREATE TABLE client (
    idClient SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    dateDeNaissance DATE NOT NULL,
    numero VARCHAR(20) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    sexeId INTEGER NOT NULL REFERENCES sexe(id),
    motDePasse VARCHAR(100) NOT NULL
);

-- information de l'entreprise
CREATE TABLE infoEntreprise (
    nom VARCHAR(100) NOT NULL,
    adresse VARCHAR(200) NOT NULL,
    logo VARCHAR(200),
    objet TEXT,
    dateDeCreation DATE
);

-- types contact
CREATE TABLE typeContact (
    idTypeContact SERIAL PRIMARY KEY,
    libelle VARCHAR(10) NOT NULL
);

-- contacts
CREATE TABLE contact (
    idContact SERIAL PRIMARY KEY,     
    idTypeContact INTEGER NOT NULL REFERENCES typeContact(IdTypeContact),
    valeur VARCHAR(100) NOT NULL
);

-- produits
CREATE TABLE produit (
    idProduit SERIAL PRIMARY KEY,
    nomProduit VARCHAR(10) NOT NULL
);

-- categorie produits
CREATE TABLE categorieProduit (
    idCategorieProduit SERIAL PRIMARY KEY,
    idProduit INTEGER NOT NULL REFERENCES produit(idProduit),
    nomCategorieProduit VARCHAR(10) NOT NULL
);

-- sous categorie produits
CREATE TABLE sousCategorieProduit (
    idSousCategorieProduit SERIAL PRIMARY KEY,
    idCategorieProduit INTEGER NOT NULL REFERENCES categorieProduit(idCategorieProduit),
    nomSousCategorieProduit VARCHAR(10) NOT NULL,
    description TEXT,
    prix NUMERIC(10, 2) NOT NULL
);

-- photo produits
CREATE TABLE photoProduit (
    idPhotoProduit SERIAL PRIMARY KEY,
    idSousCategorieProduit INTEGER NOT NULL REFERENCES sousCategorieProduit(idSousCategorieProduit),
    photo VARCHAR(10) NOT NULL
);


-- commande
CREATE TABLE commande (
    idCommande SERIAL PRIMARY KEY,
    idClient INTEGER NOT NULL REFERENCES client(idClient), 
    dateCommande DATE NOT NULL,
    lieuDeLivraison VARCHAR(10) NOT NULL,
    etat INTEGER
);

-- detail commande
CREATE TABLE detailCommande (
    idDetailCommande SERIAL PRIMARY KEY,
    idCommande INTEGER NOT NULL REFERENCES commande(idCommande),
    quantite INTEGER NOT NULL,
    idSousCategorieProduit INTEGER NOT NULL REFERENCES sousCategorieProduit(idSousCategorieProduit)
);    

-- paiment
CREATE TABLE paiement (
    idCommande INTEGER NOT NULL REFERENCES commande(idCommande),
    datePaiement DATE NOT NULL,
    prix NUMERIC(10, 2) NOT NULL
);

-- forme
CREATE TABLE forme(
    idForme SERIAL PRIMARY KEY,
    nomFrorme VARCHAR,
    idCategorieProduit INTEGER NOT NULL REFERENCES categorieProduit(idCategorieProduit)
);
-- fermeture
CREATE TABLE fermeture(
    idFermeture SERIAL PRIMARY KEY,
    nomFermeture VARCHAR
);
-- decoration
CREATE TABLE decoration(
    idDecoration SERIAL PRIMARY KEY,
    nomDecoration VARCHAR 
    -- Image ou texte
);
INSERT INTO decoration Values(default,'Image'),(default,'Texte');
-- texte decoration
CREATE table texteDecoration(
    idTexteDecoration SERIAL PRIMARY KEY,
    valeur VARCHAR
);
-- imagedecoration
CREATE TABLE imageDecoration(
    idImageDecoration SERIAL PRIMARY KEY,
    photo VARCHAR
);
-- typeAccessoire
CREATE TABLE typeAccessoire(
    idTypeAccessoire SERIAL PRIMARY KEY,
    nomTypeAccesoire VARCHAR,
    prix float,
    valeur float,
    unite VARCHAR
); 
-- ex: Perle Broderie Stickers Paillette

-- accesoire
CREATE TABLE accessoire(
    idAccessoire SERIAL PRIMARY KEY,
    idTypeAccessoire INTEGER NOT NULL REFERENCES typeAccessoire(idTypeAccessoire),
    idDecoration INTEGER NOT NULL REFERENCES decoration(idDecoration),
    couleur VARCHAR,
    idTexte INTEGER default NULL REFERENCES texteDecoration(idTexteDecoration),
    idImage INTEGER default NULL REFERENCES imageDecoration(idImageDecoration)
);

-- personnalisation
CREATE TABLE personnalisation(
    idPersonnalisation SERIAL PRIMARY KEY,
    idClient  INTEGER NOT NULL REFERENCES client(idClient),
    idForme INTEGER  NOT NULL REFERENCES forme(idForme),
    idFermeture INTEGER  NOT NULL REFERENCES fermeture(idFermeture)
);
-- personnalisationaccessoir
CREATE TABLE personnalisationAccessoire(
    idPersonnalisationAccessoire SERIAL PRIMARY KEY,
    idPersonnalisation INTEGER NOT NULL REFERENCES personnalisation(idPersonnalisation),
    idAccessoire INTEGER NOT NULL REFERENCES accessoire(idAccessoire)
);

-- NEWWWWW
CREATE TABLE unite(
    idUnite SERIAL PRIMARY KEY,
    nomUnite VARCHAR,
    abbreviation VARCHAR
);
INSERT INTO unite values(default,'kilogramme','kg'),
(default,'sachet','sa'),
(default,'gramme','g'),
(default,'litre','l');

CREATE TABLE matierePremiere(
    idMatierePremiere SERIAL PRIMARY KEY,
    nomMatierePremiere VARCHAR,
    prixUnitaire float,
    idUnite INTEGER NOT NULL REFERENCES unite(idUnite),
    photo VARCHAR
);
CREATE TABLE SousCategorieComposition(
    idComposition SERIAL PRIMARY KEY,
    idSousCategorieProduit INTEGER NOT NULL REFERENCES sousCategorieProduit(idSousCategorieProduit),
    idMatierePremiere INTEGER NOT NULL REFERENCES matierePremiere(idMatierePremiere),
    quantite INTEGER
);
CREATE TABLE mouvement(
    idMouvement SERIAL PRIMARY KEY,
    nom VARCHAR
);
INSERT INTO mouvement(nom) Values('Sortie'),('Entree');
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


CREATE TABLE equipe(
    idEquipe SERIAL PRIMARY KEY,
    nom VARCHAR,
    prenom VARCHAR,
    poste VARCHAR,
    role VARCHAR,
    image VARCHAR
);
INSERT INTO equipe(nom,prenom) Values('RAZAFINJATOVO','Diary Mickaëlla'),
('ANDRIANTIANA','Onintsoa Tsiafoy'),
('RAMPANJATONIRINA','Solondraibe Fehizoro'),
('RASOLOFONDRAIBE','Thony'),
('RAMIANDRISOA','Nandrianina Stephane'),
('RATSIMBAZAFY','Onimirenty yvannio'),
('RAKOTOMANANA','Andrimalala Fy Antra'),
('RANAIVOZAFY','Fy Andrianina'),
('RAOBIJAONA','Andriamasinotoavina Noah'),
('RABEARISOLO','Fehizoro');


-- /////////////////////////////////////////
INSERT INTO matierePremiere (nomMatierePremiere, prixUnitaire, idUnite, photo) VALUES
('Matiere 1', 10.99, 1, 'photo1.jpg'),
('Matiere 2', 15.99, 2, 'photo2.jpg');

INSERT INTO historiqueMatierePremiere (idMatierePremiere, date, quantite, idMouvement) VALUES
(1, '2023-05-01', 100, 2),
(2, '2023-05-02', 50, 1);

INSERT INTO historiqueSousCategorieProduit (idSousCategorieProduit, date, quantite, idMouvement) VALUES
(1, '2023-05-01', 10, 2),
(2, '2023-05-02', 5, 1);






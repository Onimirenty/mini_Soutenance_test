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
CREATE TABLE photoSousCategorieProduit(
    idPhotoSousCategorieProduit SERIAL PRIMARY KEY,
    idSousCategorieProduit INTEGER NOT NULL REFERENCES sousCategorieProduit(idSousCategorieProduit),
    photo VARCHAR(100) NOT NULL
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


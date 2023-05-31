create table achat(
    idAchat serial primary key,
    idClient integer references client (idClient),
    dateAchat date,
    montant numeric(10,2)
);

insert into achat(idClient,dateAchat,montant) values (1,'2023-01-15',100.5);
insert into achat(idClient,dateAchat,montant) values (1,'2023-02-20',75.20);
insert into achat(idClient,dateAchat,montant) values (1,'2023-03-10',120.80);
insert into achat(idClient,dateAchat,montant) values (1,'2023-10-05',400.10);





/*Base Mirenty*/
    CREATE VIEW v_produitSousCategorie AS
    SELECT p.idProduit, p.nomProduit, c.idCategorieProduit, c.nomCategorieProduit, s.idSousCategorieProduit, s.nomSousCategorieProduit, s.description, s.prix, ph.idPhotoProduit, ph.photo
    FROM produit p
    JOIN categorieProduit c ON p.idProduit = c.idProduit
    JOIN sousCategorieProduit s ON c.idCategorieProduit = s.idCategorieProduit
    JOIN photoProduit ph ON s.idSousCategorieProduit = ph.idSousCategorieProduit;

    INSERT INTO produit (nomProduit) VALUES ('Sac à dos'), ('Shampooing doux');
    -- Insertion de données pour le thème "sac"
    INSERT INTO produit (nomProduit) VALUES ('Sac 1');
    INSERT INTO categorieProduit (idProduit, nomCategorieProduit) VALUES (1, 'Sac à main');
    INSERT INTO sousCategorieProduit (idCategorieProduit, nomSousCategorieProduit, description, prix) VALUES (1, 'Petit sac', 'Un petit sac pratique', 29.99);
    INSERT INTO sousCategorieProduit (idCategorieProduit, nomSousCategorieProduit, description, prix) VALUES (1, 'Grand sac', 'Un grand sac spacieux', 49.99);
    INSERT INTO photoProduit (idSousCategorieProduit, photo) VALUES (1, 'sac_petit.jpg');
    INSERT INTO photoProduit (idSousCategorieProduit, photo) VALUES (2, 'sac_grand.jpg');

    -- Insertion de données pour le thème "shampooing"
    INSERT INTO produit (nomProduit) VALUES ('Shampooing 1');
    INSERT INTO categorieProduit (idProduit, nomCategorieProduit) VALUES (2, 'Shampooing pour cheveux');
    INSERT INTO sousCategorieProduit (idCategorieProduit, nomSousCategorieProduit, description, prix) VALUES (2, 'Shampooing hydratant', 'Pour des cheveux doux et hydratés', 9.99);
    INSERT INTO sousCategorieProduit (idCategorieProduit, nomSousCategorieProduit, description, prix) VALUES (2, 'Shampooing antipelliculaire', 'Pour lutter contre les pellicules', 12.99);
    INSERT INTO photoProduit (idSousCategorieProduit, photo) VALUES (3, 'shampooing_hydratant.jpg');
    INSERT INTO photoProduit (idSousCategorieProduit, photo) VALUES (4, 'shampooing_antipelliculaire.jpg');
/*base mirenty*/


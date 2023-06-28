INSERT INTO sexe(libelle) VALUES('Male'),('Femelle');

INSERT INTO client VALUES(1,'rasolofondraibe','thony','2003-01-17','0349439800','thonyrasolofondraibe1883@gmail.com',1,'0000');

INSERT INTO decoration Values(default,'Image'),(default,'Texte');


INSERT INTO produit(nomProduit) VALUES('Sac'),('Shampoing');

INSERT INTO categorieProduit(idProduit,nomCategorieProduit) VALUES(1,'Sac a dos'),(1,'Sac a main');

INSERT INTO sousCategorieProduit(idCategorieProduit,nomSousCategorieProduit,description,prix) VALUES(1,'abc','taille=8',10000);

INSERT INTO photoProduit(idSousCategorieProduit,photo) VALUES(1,'cartable.jpg');
-- Table Personnel
CREATE TABLE Personnel (
    Id_Personnel SERIAL PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Type SMALLINT NOT NULL  -- 0 pour employé, 1 pour responsable
);
-- Table État de Validation
CREATE TABLE Etat_Validation (
    Id_Etat_Validation SERIAL PRIMARY KEY,
    Nom_Etat VARCHAR(50) NOT NULL
);

-- Insert the data with corrected state names
INSERT INTO Etat_Validation (Nom_Etat)
VALUES
    ('Non traité'),
    ('En attente de pro format'),
    ('Validation finance pro format'),
    ('Validation DG'),
    ('Bon de commande envoyé'),
    ('En attente de livraison'),
    ('Vérification des documents de facturation'),
    ('Validation finale DG'),
    ('Paiement effectué, achat clos');

-- Table Département
CREATE TABLE Departement (
    Id_Departement SERIAL PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Id_Personnel INT NOT NULL,  -- Responsable du département
    FOREIGN KEY(Id_Personnel) REFERENCES Personnel(Id_Personnel)
);
-- Table Fournisseurs
CREATE TABLE Fournisseurs (
    Id_Fournisseur SERIAL PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Contact VARCHAR(50),         -- Contact du fournisseur
    Email VARCHAR(50),           -- Email du fournisseur
    Telephone VARCHAR(15),       -- Numéro de téléphone
    Adresse VARCHAR(100)         -- Adresse du fournisseur
);
-- Table Produits
CREATE TABLE Produits (
    Id_Produit SERIAL PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Description VARCHAR(150),     -- Description du produit
    Prix DECIMAL(10, 2) NOT NULL, -- Prix unitaire
    Quantite_Stock INT DEFAULT 0, -- Quantité disponible en stock
    Id_Fournisseur INT,           -- Lien vers le fournisseur
    FOREIGN KEY(Id_Fournisseur) REFERENCES Fournisseurs(Id_Fournisseur)
);
-- Table Demande_Achat
CREATE TABLE Demande_Achat (
    id_demandeAchat SERIAL PRIMARY KEY,  -- Utilisation de SERIAL pour auto-increment
    Datededemande DATE NOT NULL,          -- Type de données DATE
    IdDepartement INT NOT NULL,           -- Référence au département
    Etat_Validation INT NOT NULL,
    FOREIGN KEY(Etat_Validation) REFERENCES Etat_Validation(Id_Etat_Validation)                      
);

-- Table DetailDemande
CREATE TABLE DetailDemande (
    iddemandeAchat INT NOT NULL,          -- Référence à la demande d'achat
    idProduit INT NOT NULL,                -- Référence au produit
    qte INT NOT NULL,                      -- Quantité demandée
    FOREIGN KEY (iddemandeAchat) REFERENCES Demande_Achat(id_demandeAchat), 
    FOREIGN KEY (idProduit) REFERENCES Produits(Id_Produit) -- Clé étrangère vers Produits
);





--0- en attente
--1--valider profromat par finance
--2--valider par le dg

--1--rejeter




-- Table Proformat
CREATE TABLE Proformat (
    Id_Proformat SERIAL PRIMARY KEY,
    Id_Fournisseur INT NOT NULL,
    Id_Departement INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Description VARCHAR(150) NOT NULL,
    Date_du_proformat DATE NOT NULL,
    Etat_Validation INT NOT NULL,
    FOREIGN KEY(Id_Fournisseur) REFERENCES Fournisseurs(Id_Fournisseur),
    FOREIGN KEY(Id_Departement) REFERENCES Departement(Id_Departement),
    FOREIGN KEY(Etat_Validation) REFERENCES Etat_Validation(Id_Etat_Validation)
);

-- 1. Ajouter la colonne id_demandeAchat à la table Proformat
ALTER TABLE Proformat
ADD COLUMN id_demandeAchat INT NOT NULL;

-- 2. Ajouter la contrainte de clé étrangère
ALTER TABLE Proformat
ADD CONSTRAINT fk_iddemande
FOREIGN KEY (id_demandeAchat) REFERENCES Demande_Achat(id_demandeAchat);


-- Table Bon de Commande
CREATE TABLE Bon_de_Commande (
    Id_Bon_de_Commande SERIAL PRIMARY KEY,
    Id_Proformat INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Description VARCHAR(50) NOT NULL,
    Date_de_la_commande DATE,
    Etat_Validation INT NOT NULL,
    FOREIGN KEY(Id_Proformat) REFERENCES Proformat(Id_Proformat),
    FOREIGN KEY(Etat_Validation) REFERENCES Etat_Validation(Id_Etat_Validation)
);

-- Table Bon de Livraison
CREATE TABLE Bon_de_Livraison (
    Id_Bon_de_Livraison SERIAL PRIMARY KEY,
    Id_Bon_de_Commande INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Description VARCHAR(100) NOT NULL,
    Date_duBonLivraison DATE,
    FOREIGN KEY(Id_Bon_de_Commande) REFERENCES Bon_de_Commande(Id_Bon_de_Commande)
);

-- Table Bon de Réception
CREATE TABLE Bon_de_Reception (
    Id_Bon_de_Reception SERIAL PRIMARY KEY,
    Id_Bon_de_Livraison INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Description VARCHAR(50) NOT NULL,
    Date_duBonReception DATE NOT NULL,
    FOREIGN KEY(Id_Bon_de_Livraison) REFERENCES Bon_de_Livraison(Id_Bon_de_Livraison)
);

-- Table Facture
CREATE TABLE Facture (
    Id_Facture SERIAL PRIMARY KEY,
    Id_Bon_de_Reception INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Description VARCHAR(100) NOT NULL,
    Date_delaFacture DATE,
    Total DECIMAL(18,2) NOT NULL,
    Etat_Validation INT NOT NULL,
    FOREIGN KEY(Id_Bon_de_Reception) REFERENCES Bon_de_Reception(Id_Bon_de_Reception),
    FOREIGN KEY(Etat_Validation) REFERENCES Etat_Validation(Id_Etat_Validation)
);

-- Table Paiement
CREATE TABLE Paiement (
    Id_Paiement SERIAL PRIMARY KEY,
    Id_Facture INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Date_du_paiment DATE NOT NULL,
    Description VARCHAR(100) NOT NULL,
    etat_validation  int not null,
    Montant DECIMAL(18,2) NOT NULL,
    FOREIGN KEY(Id_Facture) REFERENCES Facture(Id_Facture),
    FOREIGN KEY(Etat_Validation) REFERENCES Etat_Validation(Id_Etat_Validation)

);

-- -- Table Depot
-- CREATE TABLE Depot (
--     Id_Depot SERIAL PRIMARY KEY,
--     Date_d_arrivee DATE
-- );

-- -- Table Stock
-- CREATE TABLE Stock (
--     Id_Stock SERIAL PRIMARY KEY,
--     Id_Depot INT NOT NULL,
--     FOREIGN KEY(Id_Depot) REFERENCES Depot(Id_Depot)
-- );

-- -- Table Produits_Depot
-- CREATE TABLE Produits_Depot (
--     Id_Produit INT,
--     Id_Depot INT,
--     Quantite INT NOT NULL,
--     PRIMARY KEY(Id_Produit, Id_Depot),
--     FOREIGN KEY(Id_Produit) REFERENCES Produits(Id_Produit),
--     FOREIGN KEY(Id_Depot) REFERENCES Depot(Id_Depot)
-- );

-- Table Détails Proformat
CREATE TABLE Details_Proformat (
    Id SERIAL PRIMARY KEY,
    Id_Proformat INT,
    Id_Produit INT,
    Quantite_Commandee INT,
    Prix_Unitaire DECIMAL(10, 2),
    Total DECIMAL(10, 2),
    FOREIGN KEY (Id_Proformat) REFERENCES Proformat(Id_Proformat),
    FOREIGN KEY (Id_Produit) REFERENCES Produits(Id_Produit)
);

-- Table Détails Bon de Commande
CREATE TABLE Details_Bon_de_Commande (
    Id SERIAL PRIMARY KEY,
    Id_Bon_de_Commande INT,
    Id_Produit INT,
    Quantite_Commandee INT,
    Prix_Unitaire DECIMAL(10, 2),
    Total DECIMAL(10, 2),
    FOREIGN KEY (Id_Bon_de_Commande) REFERENCES Bon_de_Commande(Id_Bon_de_Commande),
    FOREIGN KEY (Id_Produit) REFERENCES Produits(Id_Produit)
);

-- Table Détails Bon de Livraison
CREATE TABLE Details_Bon_de_Livraison (
    Id SERIAL PRIMARY KEY,
    Id_Bon_de_Livraison INT NOT NULL,
    Id_Produit INT NOT NULL,
    Quantite_Livree INT NOT NULL,
    FOREIGN KEY (Id_Bon_de_Livraison) REFERENCES Bon_de_Livraison(Id_Bon_de_Livraison),
    FOREIGN KEY (Id_Produit) REFERENCES Produits(Id_Produit)
);

-- Table Détails Bon de Réception
CREATE TABLE Details_Bon_de_Reception (
    Id SERIAL PRIMARY KEY,
    Id_Bon_de_Reception INT NOT NULL,
    Id_Produit INT NOT NULL,
    Quantite_Recue INT NOT NULL,
    FOREIGN KEY (Id_Bon_de_Reception) REFERENCES Bon_de_Reception(Id_Bon_de_Reception),
    FOREIGN KEY (Id_Produit) REFERENCES Produits(Id_Produit)
);

-- Table Détails Facture
CREATE TABLE Details_Facture (
    Id SERIAL PRIMARY KEY,
    Id_Facture INT NOT NULL,
    Id_Produit INT NOT NULL,
    Quantite_Facturee INT NOT NULL,
    Prix_Unitaire DECIMAL(10, 2) NOT NULL,
    Total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (Id_Facture) REFERENCES Facture(Id_Facture),
    FOREIGN KEY (Id_Produit) REFERENCES Produits(Id_Produit)
);

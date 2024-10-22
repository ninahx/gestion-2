-- Insérer deux nouveaux proformats avec la demande d'achat associée
INSERT INTO Proformat (Id_Fournisseur, Id_Departement, id_demandeAchat, Date_du_proformat, Description, Nom, Etat_Validation) VALUES
(1, 10, 3, '2024-10-21', 'Proforma pour la commande de 100 unités de Produit A', 'Proformat A', 1),
(1, 10, 2, '2024-10-22', 'Proforma pour la commande de 50 unités de Produit B et C', 'Proformat B', 1);

-- Insérer des détails associés pour le premier proformat
INSERT INTO Details_Proformat (Id_Proformat, Id_Produit, Quantite_Commandee, Prix_Unitaire, Total) VALUES
(10, 11, 100, 10.00, 1000.00),  -- Produit A associé au Proformat A
(10, 12, 50, 20.00, 1000.00);   -- Produit B associé au Proformat A

-- Insérer des détails associés pour le deuxième proformat
INSERT INTO Details_Proformat (Id_Proformat, Id_Produit, Quantite_Commandee, Prix_Unitaire, Total) VALUES
(11, 11, 50, 20.00, 1000.00),  -- Produit B associé au Proformat B
(11, 12, 50, 30.00, 1500.00);  -- Produit C associé au Proformat B

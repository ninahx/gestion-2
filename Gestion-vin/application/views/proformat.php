<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap Admin Dashboards">
    <meta name="author" content="Bootstrap Gallery">
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.svg'); ?>">

    <!-- Title -->
    <title>Bienvenue</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/bootstrap/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/overlay-scroll/OverlayScrollbars.min.css'); ?>">

    <!-- Include html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">
        <?php include('menu.php')?>
        <!-- Main container start -->
        <div class="main-container">
            <!-- Content wrapper scroll start -->
            <div class="content-wrapper-scroll">
                <!-- Content wrapper start -->
                <div class="content-wrapper">
                    <div class="container">
                        <!-- Détails du fournisseur -->
                        <div class="proforma-header text-center">
                            <h2>Pro forma</h2>
                            <p>Date: <span id="proformaDate">21/10/2024</span></p>
                        </div>

                        <!-- Informations fournisseur et client -->
                        <div class="row">
                            <div class="col-md-6 supplier-details">
                                <h5>Fournisseur</h5>
                                <p>
                                    Nom de l'entreprise: ABC Fournitures<br>
                                    Adresse: 123 Rue de l'Industrie, Paris, France<br>
                                    Téléphone: +33 1 23 45 67 89<br>
                                    Email: contact@abcfournitures.com
                                </p>
                            </div>
                            <div class="col-md-6 customer-details">
                                <h5>Client</h5>
                                <p>
                                    Nom du client: XYZ Entreprise<br>
                                    Adresse: 789 Avenue de la République, Lyon, France<br>
                                    Téléphone: +33 4 56 78 90 12<br>
                                    Email: info@xyzentreprise.com
                                </p>
                            </div>
                        </div>

                        <!-- Tableau des produits -->
                        <table class="table table-bordered products-table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Description</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire (€)</th>
                                    <th>Total (€)</th>
                                </tr>
                            </thead>
                            <tbody id="produitsTableBody">
                                <!-- Les produits seront ajoutés ici par JavaScript -->
                            </tbody>
                        </table>

                        <!-- Total général -->
                        <div class="total">
                            <p>Total HT: <span id="totalHT">0.00</span> €</p>
                            <p>TVA (20%): <span id="totalTVA">0.00</span> €</p>
                            <p><strong>Total TTC: <span id="totalTTC">0.00</span> €</strong></p>
                        </div>
                        <button id="exportPdf" class="btn btn-primary">Exporter en PDF</button>
                    </div>

                    <script>
                        // Données statiques pour les produits
                        const produits = [
                            {
                                nom: 'Ordinateur portable',
                                description: 'Laptop 15" avec processeur Intel i5',
                                quantite: 5,
                                prixUnitaire: 750
                            },
                            {
                                nom: 'Imprimante Laser',
                                description: 'Imprimante laser monochrome, modèle XYZ',
                                quantite: 2,
                                prixUnitaire: 200
                            },
                            {
                                nom: 'Fauteuil ergonomique',
                                description: 'Chaise de bureau avec accoudoirs et réglages multiples',
                                quantite: 10,
                                prixUnitaire: 120
                            }
                        ];

                        // Fonction pour calculer le total
                        function calculateTotal() {
                            let totalHT = 0;
                            produits.forEach(produit => {
                                const totalProduit = produit.quantite * produit.prixUnitaire;
                                totalHT += totalProduit;
                            });
                            return totalHT;
                        }

                        // Fonction pour remplir le tableau des produits
                        function remplirTableProduits() {
                            const tableBody = document.getElementById('produitsTableBody');
                            let totalHT = 0;

                            produits.forEach(produit => {
                                const row = document.createElement('tr');

                                // Colonne Produit
                                const produitCell = document.createElement('td');
                                produitCell.textContent = produit.nom;
                                row.appendChild(produitCell);

                                // Colonne Description
                                const descriptionCell = document.createElement('td');
                                descriptionCell.textContent = produit.description;
                                row.appendChild(descriptionCell);

                                // Colonne Quantité
                                const quantiteCell = document.createElement('td');
                                quantiteCell.textContent = produit.quantite;
                                row.appendChild(quantiteCell);

                                // Colonne Prix Unitaire
                                const prixCell = document.createElement('td');
                                prixCell.textContent = produit.prixUnitaire.toFixed(2);
                                row.appendChild(prixCell);

                                // Colonne Total
                                const totalProduit = produit.quantite * produit.prixUnitaire;
                                const totalCell = document.createElement('td');
                                totalCell.textContent = totalProduit.toFixed(2);
                                row.appendChild(totalCell);

                                tableBody.appendChild(row);
                                totalHT += totalProduit;
                            });

                            // Affichage des totaux
                            document.getElementById('totalHT').textContent = totalHT.toFixed(2);
                            const totalTVA = totalHT * 0.20;
                            document.getElementById('totalTVA').textContent = totalTVA.toFixed(2);
                            const totalTTC = totalHT + totalTVA;
                            document.getElementById('totalTTC').textContent = totalTTC.toFixed(2);
                        }

                        // Fonction pour exporter en PDF
                        function exportPdf() {
                            const element = document.querySelector('.content-wrapper'); // Le conteneur à exporter
                            html2pdf()
                                .from(element)
                                .save('proforma.pdf'); // Nom du fichier PDF
                        }

                        // Ajouter un écouteur d'événement au bouton
                        document.getElementById('exportPdf').addEventListener('click', exportPdf);

                        // Appel de la fonction pour remplir le tableau à l'initialisation
                        window.onload = remplirTableProduits;
                    </script>
                </div>
                <!-- Content wrapper end -->
            </div>
            <!-- Content wrapper scroll end -->
        </div>
        <!-- Main container end -->
    </div>
    <!-- Page wrapper end -->

    <!-- JS Files -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/moment.js'); ?>"></script>

    <!-- Vendor Js Files -->
    <script src="<?php echo base_url('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/overlay-scroll/custom-scrollbar.js'); ?>"></script>

    <!-- Apex Charts -->
    <script src="<?php echo base_url('assets/vendor/apex/apexcharts.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/apex/custom/sales/sparkline.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/apex/custom/sales/salesGraph.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/apex/custom/sales/revenueGraph.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/apex/custom/sales/profitGraph.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/apex/custom/sales/rangeGraph.js'); ?>"></script>

    <!-- Main Js -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>

</html>

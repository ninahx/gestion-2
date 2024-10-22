<!DOCTYPE html>
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
<div class="container">
<?php include('menu.php')?>

        <h2>Tableau des Demandes d'Achat</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Description de la Demande d'Achat</th>
                    <th>Proformats Reçus</th>
                    <th>Bons de Commande</th>
                    <th>Bons de Livraison</th>
                    <th>Bons de Réception</th>
                    <th>Factures</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ordinateurs portables pour le bureau</td>
                    <td><a href="lien_proformat_1.pdf" target="_blank">Proformat 1</a></td>
                    <td><a href="lien_bon_commande_1.pdf" target="_blank">Bon de Commande 1</a></td>
                    <td><a href="lien_bon_livraison_1.pdf" target="_blank">Bon de Livraison 1</a></td>
                    <td><a href="lien_bon_reception_1.pdf" target="_blank">Bon de Réception 1</a></td>
                    <td><a href="lien_facture_1.pdf" target="_blank">Facture 1</a></td>
                </tr>
                <tr>
                    <td>Imprimantes Laser</td>
                    <td><a href="voirProformat.html" target="_blank">Proformat 2</a></td>
                    <td><a href="voirBondecommande.html" target="_blank">Bon de Commande 2</a></td>
                    <td><a href="lien_bon_livraison_2.pdf" target="_blank">Bon de Livraison 2</a></td>
                    <td><a href="lien_bon_reception_2.pdf" target="_blank">Bon de Réception 2</a></td>
                    <td><a href="lien_facture_2.pdf" target="_blank">Facture 2</a></td>
                </tr>
                <tr>
                    <td>Fauteuils ergonomiques pour le personnel</td>
                    <td><a href="lien_proformat_3.pdf" target="_blank">Proformat 3</a></td>
                    <td><a href="lien_bon_commande_3.pdf" target="_blank">Bon de Commande 3</a></td>
                    <td><a href="lien_bon_livraison_3.pdf" target="_blank">Bon de Livraison 3</a></td>
                    <td><a href="lien_bon_reception_3.pdf" target="_blank">Bon de Réception 3</a></td>
                    <td><a href="lien_facture_3.pdf" target="_blank">Facture 3</a></td>
                </tr>
                <!-- Ajoute d'autres lignes selon tes besoins -->
            </tbody>
        </table>
    </div>
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
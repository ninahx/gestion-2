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
    <title>Liste des Proforma</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/bootstrap/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/overlay-scroll/OverlayScrollbars.min.css'); ?>">

    <!-- Include html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>

<body>
<?php include('menu.php')?>

<div class="container mt-5">
        <h1>Liste des Proformats</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date du Proforma</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Produits</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="proformatsTableBody">
                <?php foreach ($proformats as $proformat): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($proformat['date_du_proformat']); ?></td> <!-- Changed to lowercase -->
                        <td><?php echo htmlspecialchars($proformat['description']); ?></td> <!-- Changed to lowercase -->
                        <td><?php echo htmlspecialchars($proformat['etat_validation']); ?></td> <!-- Display the validation status -->
                        <td>
                            <?php
                            // Assuming 'Produits' is being fetched from another method
                            $produits = $this->Proformat_model->get_proformat_details($proformat['id_proformat']);
                            if (!empty($produits)) {
                                $produitNames = array_column($produits, 'produit'); // Get product names
                                echo htmlspecialchars(implode(', ', $produitNames)); // Display product names
                            } else {
                                echo 'Aucun produit associé';
                            }
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-primary me-2" onclick="window.open('lien_proformat_<?php echo $proformat['id_proformat']; ?>.pdf', '_blank')">Voir Proforma</button>
                            <button class="btn btn-danger me-2" onclick="window.location.href='<?php echo site_url('proformat_ctrl/reject_proformat/' . $proformat['id_proformat']); ?>'">Rejeter</button>

                            <button class="btn btn-success" onclick="alert('Proforma envoyé pour: <?php echo htmlspecialchars($proformat['description']); ?>')">Envoyer Bon de commande</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>


        </table>
    </div>

    <!-- JS Files -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/moment.js'); ?>"></script>

    <!-- Vendor Js Files -->
    <script src="<?php echo base_url('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/overlay-scroll/custom-scrollbar.js'); ?>"></script>

    <!-- Main Js -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>

</html>

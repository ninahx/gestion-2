<!DOCTYPE html>
<html lang="fr">

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
<?php include('menu.php')?>
    <div class="container mt-5">
        <a href="<?php echo site_url('stock_ctrl'); ?>">Voir situation Stock</a>
        <h1>Billet de Sortie/Entrée de Produits</h1>
        <form id="billetForm" onsubmit="enregistrerBillet(event)">
            <div class="form-group">
                <label for="produitSelect">Sélectionnez un Produit</label>
                <select id="produitSelect" class="form-control" required>
                    <option value="">Choisissez un produit</option>
                    <?php foreach ($produits as $produit): ?>
                        <option value="<?php echo $produit->id_produit; ?>"><?php echo $produit->nom; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="quantiteInput">Quantité</label>
                <input type="number" id="quantiteInput" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <label for="typeOperation">Type d'Opération</label>
                <select id="typeOperation" class="form-control" onchange="togglePrixInput()" required>
                    <option value="">Choisissez une opération</option>
                    <option value="entree">Entrée</option>
                    <option value="sortie">Sortie</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dateInput">Date</label>
                <input type="date" id="dateInput" class="form-control" required>
            </div>

            <div class="form-group" id="prixContainer" style="display: none;">
                <label for="prixInput">Prix Unitaire</label>
                <input type="number" id="prixInput" class="form-control" step="0.01" min="0">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Enregistrer Billet</button>
        </form>

        <h3 class="mt-5">Billets Enregistrés</h3>
        <table class="table table-bordered mt-3" id="billetsTable">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Type d'Opération</th>
                    <th>Date</th>
                    <th>Prix Unitaire</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les billets seront ajoutés ici dynamiquement -->
            </tbody>
        </table>
    </div>

    <script>
        const billets = [];

        function togglePrixInput() {
            const typeOperation = document.getElementById('typeOperation').value;
            const prixContainer = document.getElementById('prixContainer');
            if (typeOperation === 'entree') {
                prixContainer.style.display = 'block'; // Affiche le champ prix
            } else {
                prixContainer.style.display = 'none'; // Masque le champ prix
                document.getElementById('prixInput').value = ''; // Réinitialise le prix
            }
        }

        function enregistrerBillet(event) {
            event.preventDefault(); // Empêche le rechargement de la page

            const produit = document.getElementById('produitSelect').value;
            const quantite = parseInt(document.getElementById('quantiteInput').value);
            const typeOperation = document.getElementById('typeOperation').value;
            const date = document.getElementById('dateInput').value;
            const prix = typeOperation === 'entree' ? parseFloat(document.getElementById('prixInput').value) : null;

            // Ajout du billet au tableau
            billets.push({ produit, quantite, typeOperation, date, prix });

            // Réinitialisation du formulaire
            document.getElementById('billetForm').reset();
            togglePrixInput(); // Réinitialiser le champ prix

            // Mettre à jour le tableau
            afficherBillets();
        }

        function afficherBillets() {
            const billetsTable = document.getElementById('billetsTable').getElementsByTagName('tbody')[0];
            billetsTable.innerHTML = ''; // Réinitialiser le contenu

            billets.forEach(billet => {
                const row = billetsTable.insertRow();
                row.insertCell(0).innerText = billet.produit;
                row.insertCell(1).innerText = billet.quantite;
                row.insertCell(2).innerText = billet.typeOperation === 'entree' ? 'Entrée' : 'Sortie';
                row.insertCell(3).innerText = billet.date;
                row.insertCell(4).innerText = billet.prix !== null ? billet.prix.toFixed(2) : '-';
            });
        }
    </script>

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

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

    <!-- Loading wrapper start -->
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">
        <?php include('menu.php')?>

        <!-- Content wrapper scroll start -->
        <div class="content-wrapper-scroll">

          <!-- Content wrapper start -->
          <div class="content-wrapper">

    
            <div class="container">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <h1 class="mt-5">Demande Achat</h1>

            
            <form action="" method="post">
                <div class="form-group">
                    <label for="dateTime">Date et Heure :</label>
                    <input type="datetime-local" id="dateTime" name="dateTime" class="form-control" required>
                    <br>
                    <label for="client">Departement</label>
                    <select name="clientId" id="client" class="form-control">
                        <option value="">Sélectionnez votre departement</option>
                        <!-- Clients ajoutés par JavaScript -->
                    </select>
                </div>

                <div class="produit_list">
                    <table border="1" id="tableAvoirDetails" class="table">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Produits ajoutés par JavaScript -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="ajouterLigne()">Ajouter Produit</button>
                </div>

                <div class="validation_button">
                    <button type="submit" class="btn btn-success mt-3">Envoyer demande</button>
                </div>
            </form>
         </div>
                  
         <!-- row end> -->
          </div>
          <!-- Content wrapper end -->

          <!-- App Footer start -->
          <div class="app-footer">
            <span>© Bootstrap Gallery 2023</span>
          </div>
          <!-- App footer end -->

        </div>
        <!-- Content wrapper scroll end -->

      </div>
      <!-- *************
				************ Main container end *************
			************* -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
			************ Required JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/moment.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    <script src="assets/vendor/apex/apexcharts.min.js"></script>
    <script src="assets/vendor/apex/custom/sales/sparkline.js"></script>
    <script src="assets/vendor/apex/custom/sales/salesGraph.js"></script>
    <script src="assets/vendor/apex/custom/sales/revenueGraph.js"></script>
    <script src="assets/vendor/apex/custom/sales/taskGraph.js"></script>

    <!-- Vector Maps -->
    <script src="assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="assets/vendor/jvectormap/world-mill-en.js"></script>
    <script src="assets/vendor/jvectormap/gdp-data.js"></script>
    <script src="assets/vendor/jvectormap/custom/world-map-markers2.js"></script>

    <!-- Main Js Required -->
    <script src="assets/js/main.js"></script>

    <script>
        const clients = [
            { id: 1, nom: 'Jean Dupont' },
            { id: 2, nom: 'Marie Curie' },
            { id: 3, nom: 'Albert Einstein' }
        ];

        const produits = [
            { id: 1, val: 'Produit A', puVente: 10.00 },
            { id: 2, val: 'Produit B', puVente: 20.50 },
            { id: 3, val: 'Produit C', puVente: 15.75 }
        ];

        // Remplir la liste des clients
        const clientSelect = document.getElementById('client');
        clients.forEach(client => {
            const option = document.createElement('option');
            option.value = client.id;
            option.textContent = client.nom;
            clientSelect.appendChild(option);
        });

        // Ajouter une ligne de produit
        function ajouterLigne() {
            const table = document.getElementById("tableAvoirDetails").getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const cellProduit = newRow.insertCell(0);
            const cellQuantite = newRow.insertCell(1);
            const cellPrixUnitaire = newRow.insertCell(2);
            const cellTotal = newRow.insertCell(3);
            const cellSupprimer = newRow.insertCell(4);

            const selectProduit = document.createElement('select');
            selectProduit.name = 'produit[]';
            selectProduit.classList.add('form-control');
            selectProduit.onchange = function() { updatePrixUnitaire(this); };

            produits.forEach(produit => {
                const option = document.createElement('option');
                option.value = produit.id;
                option.textContent = produit.val;
                option.dataset.prix = produit.puVente;
                selectProduit.appendChild(option);
            });

            cellProduit.appendChild(selectProduit);
            cellQuantite.innerHTML = `<input type="number" step="0.01" name="quantite[]" placeholder="Quantité" class="form-control" oninput="calculateTotal(this)">`;
            cellPrixUnitaire.innerHTML = `<input type="text" name="PrixUnitaire[]" readonly class="form-control">`;
            cellTotal.innerHTML = `<input type="text" name="total[]" readonly class="form-control">`;
            cellSupprimer.innerHTML = `<button type="button" class="btn btn-danger" onclick="supprimerLigne(this)">Supprimer</button>`;
        }

        // Mettre à jour le prix unitaire du produit sélectionné
        function updatePrixUnitaire(selectElement) {
            const prixUnitaire = selectElement.options[selectElement.selectedIndex].dataset.prix;
            const row = selectElement.closest('tr');
            const prixInput = row.querySelector('input[name="PrixUnitaire[]"]');
            prixInput.value = prixUnitaire;
            calculateTotal(row.querySelector('input[name="quantite[]"]'));
        }

        // Calculer le total pour chaque ligne
        function calculateTotal(inputElement) {
            const row = inputElement.closest('tr');
            const quantite = parseFloat(inputElement.value) || 0;
            const prixUnitaire = parseFloat(row.querySelector('input[name="PrixUnitaire[]"]').value) || 0;
            const total = quantite * prixUnitaire;
            const totalInput = row.querySelector('input[name="total[]"]');
            totalInput.value = total.toFixed(2);
        }

        // Supprimer une ligne
        function supprimerLigne(buttonElement) {
            const row = buttonElement.closest('tr');
            row.remove();
        }

        // Ajout d'une ligne initiale au chargement de la page
        document.addEventListener('DOMContentLoaded', function () {
            ajouterLigne();
        });
    </script>

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
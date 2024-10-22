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
        <h1>Gestion de Stock par Produit</h1>
        <form id="stockForm" onsubmit="afficherBillets(event)">
            <div class="form-group">
                <label for="produitSelect">Sélectionnez un Produit</label>
                <select id="produitSelect" class="form-control" required>
                    <option value="">Choisissez un produit</option>
                    <option value="Produit A">Produit A</option>
                    <option value="Produit B">Produit B</option>
                    <option value="Produit C">Produit C</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dateDebut">Date de Début</label>
                <input type="date" id="dateDebut" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dateFin">Date de Fin</label>
                <input type="date" id="dateFin" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Afficher Billets</button>
        </form>

        <h3 class="mt-5">Billets pour <span id="produitAffiche"></span> entre <span id="dateRange"></span></h3>
        <table class="table table-bordered mt-3" id="billetsTable">
            <thead>
                <tr>
                    <th>Date</th>
                    <th colspan="3">Entrée</th>
                    <th colspan="3">Sortie</th>
                    <th colspan="3">Stock</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Valeur Totale</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Valeur Totale</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Valeur Totale</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les billets seront ajoutés ici dynamiquement -->
            </tbody>
        </table>

        <h4 class="mt-5">Résumé</h4>
        <p id="resume"></p>
    </div>

    <script>
        const billets = [
            { produit: 'Produit A', quantite: 10, typeOperation: 'entree', date: '2024-10-01', prix: 20 },
            { produit: 'Produit A', quantite: 5, typeOperation: 'sortie', date: '2024-10-05', prix: null },
            { produit: 'Produit A', quantite: 15, typeOperation: 'entree', date: '2024-10-10', prix: 18 },
            { produit: 'Produit B', quantite: 8, typeOperation: 'entree', date: '2024-10-02', prix: 30 },
            { produit: 'Produit C', quantite: 12, typeOperation: 'entree', date: '2024-10-04', prix: 15 },
            { produit: 'Produit B', quantite: 2, typeOperation: 'sortie', date: '2024-10-15', prix: null },
            // Ajoutez d'autres billets au besoin
        ];

        function afficherBillets(event) {
            event.preventDefault(); // Empêche le rechargement de la page

            const produit = document.getElementById('produitSelect').value;
            const dateDebut = new Date(document.getElementById('dateDebut').value);
            const dateFin = new Date(document.getElementById('dateFin').value);
            const method = document.getElementById('methodSelect').value;
            const billetsTable = document.getElementById('billetsTable').getElementsByTagName('tbody')[0];
            billetsTable.innerHTML = ''; // Réinitialiser le contenu

            let stockInitial = 0;
            let stockFinal = 0;
            let totalValeurStock = 0;
            let entrées = [];
            let sorties = [];

            billets.forEach(billet => {
                const billetDate = new Date(billet.date);
                if (billet.produit === produit && billetDate >= dateDebut && billetDate <= dateFin) {
                    if (billet.typeOperation === 'entree') {
                        entrées.push(billet);
                    } else {
                        sorties.push(billet);
                    }
                }
            });

            // Calculer le stock selon la méthode choisie
            const stock = calculerStock(entrées, sorties, method);

            // Remplir le tableau avec les entrées et sorties
            stock.entrees.forEach(billet => {
                const row = billetsTable.insertRow();
                row.insertCell(0).innerText = billet.date;
                row.insertCell(1).innerText = billet.quantite;
                row.insertCell(2).innerText = billet.prix !== null ? billet.prix.toFixed(2) : '-';
                row.insertCell(3).innerText = billet.prix !== null ? (billet.quantite * billet.prix).toFixed(2) : '-';
            });

            stock.sorties.forEach(billet => {
                const row = billetsTable.insertRow();
                row.insertCell(0).innerText = billet.date;
                row.insertCell(1).innerText = '-';
                row.insertCell(2).innerText = '-';
                row.insertCell(3).innerText = '-';
                row.insertCell(4).innerText = billet.quantite;
                row.insertCell(5).innerText = '-'; // Prix unitaire non applicable pour sortie
                row.insertCell(6).innerText = '-'; // Valeur totale non applicable pour sortie
            });

            // Mettre à jour l'affichage du produit et de la date
            document.getElementById('produitAffiche').innerText = produit;
            document.getElementById('dateRange').innerText = `${dateDebut.toLocaleDateString()} à ${dateFin.toLocaleDateString()}`;

            // Résumé
            document.getElementById('resume').innerText = `Stock Initial: ${stockInitial} unités, Stock Final: ${stockFinal} unités, Valeur du Stock: ${totalValeurStock.toFixed(2)} €`;
        }

        function calculerStock(entrées, sorties, method) {
            let stockFinal = 0;
            let valeurStock = 0;

            // Appliquer la méthode de gestion de stock
            const result = {
                entrees: [],
                sorties: []
            };

            // Traiter les entrées
            for (let i = 0; i < entrées.length; i++) {
                const billet = entrées[i];
                result.entrees.push(billet);
                stockFinal += billet.quantite;
                if (billet.prix !== null) {
                    valeurStock += billet.quantite * billet.prix;
                }
            }

            // Traiter les sorties selon la méthode choisie
            for (let i = 0; i < sorties.length; i++) {
                const billet = sorties[i];
                let quantiteSortie = billet.quantite;

                if (method === 'fifo') {
                    // FIFO: Utiliser les plus anciennes entrées en premier
                    for (let j = 0; j < result.entrees.length && quantiteSortie > 0; j++) {
                        const entree = result.entrees[j];
                        if (entree.quantite > 0) {
                            if (entree.quantite >= quantiteSortie) {
                                entree.quantite -= quantiteSortie;
                                quantiteSortie = 0;
                            } else {
                                quantiteSortie -= entree.quantite;
                                entree.quantite = 0;
                            }
                        }
                    }
                } else if (method === 'lifo') {
                    // LIFO: Utiliser les plus récentes entrées en premier
                    for (let j = result.entrees.length - 1; j >= 0 && quantiteSortie > 0; j--) {
                        const entree = result.entrees[j];
                        if (entree.quantite > 0) {
                            if (entree.quantite >= quantiteSortie) {
                                entree.quantite -= quantiteSortie;
                                quantiteSortie = 0;
                            } else {
                                quantiteSortie -= entree.quantite;
                                entree.quantite = 0;
                            }
                        }
                    }
                } else if (method === 'cmup') {
                    // CMUP: Coût moyen unitaire pondéré
                    const totalQuantiteEntrees = result.entrees.reduce((sum, e) => sum + e.quantite, 0);
                    const totalValeurEntrees = result.entrees.reduce((sum, e) => sum + (e.quantite * (e.prix || 0)), 0);
                    const cmup = totalValeurEntrees / (totalQuantiteEntrees || 1);

                    stockFinal -= billet.quantite;
                    valeurStock -= billet.quantite * cmup;
                }

                result.sorties.push(billet);
            }

            return {
                stockFinal,
                valeurStock,
                entrees: result.entrees,
                sorties: result.sorties
            };
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

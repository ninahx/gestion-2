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
    <title>Liste des Proformats</title>

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
        <h1>Liste des Demandes d'Achat</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date de la demande</th>
                    <th>Département concerné</th>
                    <th>Statut</th>
                    <th>Produits demandés</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="demandesTableBody">
                <!-- Les lignes seront ajoutées ici par JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        // Données statiques pour les demandes d'achat
        const demandesAchat = [
            {
                date: '2024-10-20',
                departement: 'Marketing',
                statut: 'En attente',
                produits: ['Ordinateur portable', 'Imprimante', 'Projecteur']
            },
            {
                date: '2024-10-18',
                departement: 'Informatique',
                statut: 'Rejeté',
                produits: ['Serveur', 'Routeur']
            },
            {
                date: '2024-10-15',
                departement: 'RH',
                statut: 'Approuvé',
                produits: ['Bureau', 'Chaise ergonomique', 'Papeterie']
            }
        ];

        // Fonction pour ajouter les demandes dans le tableau
        function remplirTableDemandes() {
            const tableBody = document.getElementById('demandesTableBody');
            demandesAchat.forEach((demande, index) => {
                const row = document.createElement('tr');

                // Colonne date
                const dateCell = document.createElement('td');
                dateCell.textContent = demande.date;
                row.appendChild(dateCell);

                // Colonne département
                const departementCell = document.createElement('td');
                departementCell.textContent = demande.departement;
                row.appendChild(departementCell);

                // Colonne statut
                const statutCell = document.createElement('td');
                statutCell.textContent = demande.statut;
                statutCell.setAttribute('id', `statut-${index}`);
                row.appendChild(statutCell);

                // Colonne produits demandés
                const produitsCell = document.createElement('td');
                const produitList = document.createElement('ul');
                demande.produits.forEach(produit => {
                    const listItem = document.createElement('li');
                    listItem.textContent = produit;
                    produitList.appendChild(listItem);
                });
                produitsCell.appendChild(produitList);
                row.appendChild(produitsCell);

                // Colonne action - bouton changer statut
                const actionCell = document.createElement('td');
                const boutonChangerStatut = document.createElement('button');
                boutonChangerStatut.textContent = 'Changer Statut';
                boutonChangerStatut.className = 'btn btn-primary';
                boutonChangerStatut.onclick = () => changerStatut(index);
                actionCell.appendChild(boutonChangerStatut);
                row.appendChild(actionCell);

                // Ajout de la ligne au tableau
                tableBody.appendChild(row);
            });
        }

        // Fonction pour changer le statut de la demande
        function changerStatut(index) {
            const nouveauStatut = prompt('Entrez le nouveau statut (ex: Approuvé, Rejeté, En attente):');
            if (nouveauStatut) {
                const statutCell = document.getElementById(`statut-${index}`);
                statutCell.textContent = nouveauStatut;
                demandesAchat[index].statut = nouveauStatut; // Mettre à jour dans les données statiques
            }
        }

        // Appel de la fonction pour remplir le tableau lors du chargement de la page
        document.addEventListener('DOMContentLoaded', remplirTableDemandes);
    </script>

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

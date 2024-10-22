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
    <link rel="shortcut icon" href="<?php echo base_url(' assets/images/favicon.svg'); ?>">
   
    <!-- Title -->
    <title>Bienvenue</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/bootstrap/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/overlay-scroll/OverlayScrollbars.min.css'); ?>">

</head>

<body>
<div class="page-wrapper">
<?php include('menu.php')?>
</div>
    <!-- Row start -->
    <div class="row gx-3">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Créer Personnel</div>
                    <a href="view-personnel.html" class="btn btn-dark">Voir Personnel</a>
                </div>
                <div class="card-body">

                    <div class="create-personnel-wrapper">
                        <!-- Form start -->
                        <form action="<?php echo base_url('personnel/create'); ?>" method="POST">
                            <div class="row gx-3">
                                <div class="col-xxl-4 col-lg-5 col-sm-6 col-12">
                                    <!-- Nom -->
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom du Personnel">
                                    </div>

                                    <!-- Prénom -->
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom du Personnel">
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email du Personnel">
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Téléphone</label>
                                        <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Téléphone du Personnel">
                                    </div>

                                    <!-- Département -->
                                    <div class="mb-3">
                                        <label for="departement" class="form-label">Département</label>
                                        <select name="departement" id="departement" class="form-control">
                                            <!-- Options dynamiques ici -->
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-sm-12 col-12">
                                        <button type="submit" class="btn btn-primary">Créer Personnel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row end -->
</body>
</html>

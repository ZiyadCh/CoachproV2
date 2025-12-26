<?php
session_start();
if (!$_SESSION) {
    header("location: ./login.php");
    exit();
}
require_once "../classes/seance.php";
$seance = new seance(0,0,0,0,0);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Coach - Plateforme Sportive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        

        .sidebar {
            min-height: 100vh;
            background-color: #1a3c34;
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #2d5f56;
        }

        .stat-card {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .table-actions .btn {
            font-size: 0.9rem;
        }
        #reser{
            display: none;
        }
   </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar p-3">
                <h4 class="text-white text-center mb-4">Coach Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link active"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                    <li class="nav-item mt-5"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="mb-4">Bienvenue <?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></h2>
                <div class="card shadow mb-5">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Mes Séances</h5>
                        <a href="./create.seance.php" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-2"></i>Ajouter une séance
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Coach</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Durée</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $seance->showDisponibleCoach(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Réservations Reçues</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Sportif</th>
                                        <th>Date de réservation</th>
                                        <th>Heure</th>
                                        <th>Durée</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    $seance->showReservee($_SESSION['id']);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
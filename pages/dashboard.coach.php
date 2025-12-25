<?php
session_start();
if (!$_SESSION) {
    header("location: ./login.php");
    exit();
}
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
        .badge-disponible { background-color: #28a745; }
        .badge-reservee { background-color: #ffc107; color: black; }
        .badge-annulee { background-color: #dc3545; }
        .badge-en-attente { background-color: #fd7e14; }
        .badge-confirmee { background-color: #198754; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar p-3">
                <h4 class="text-white text-center mb-4">Coach Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link active"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user me-2"></i>Mon Profil</a></li>
                    <li class="nav-item mt-5"><a href="/auth/logout.php" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="mb-4">Bienvenue <?php echo htmlspecialchars($_SESSION["prenom"] . " " . $_SESSION["nom"]); ?></h2>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card shadow">
                            <div class="card-body text-center">
                                <h5>Demande en attente</h5>
                                <h3>5</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card shadow">
                            <div class="card-body text-center">
                                <h5>Séances aujourd'hui</h5>
                                <h3>3</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card shadow">
                            <div class="card-body text-center">
                                <h5>Séances demain</h5>
                                <h3>4</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card shadow">
                            <div class="card-body text-center">
                                <h5>Prochaine séance</h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Durée</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025-12-26</td>
                                        <td>14:30</td>
                                        <td>60 min</td>
                                        <td><span class="badge badge-disponible">Disponible</span></td>
                                        <td>
                                            <a href="modifier_seance.php?id=1" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="supprimer_seance.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette séance ?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
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
                                        <th>Séance (Date & Heure)</th>
                                        <th>Date de réservation</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ahmed Benali</td>
                                        <td>2025-12-26 à 14:30 (60 min)</td>
                                        <td>2025-12-24</td>
                                        <td><span class="badge badge-en-attente">En attente</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm">Accepter</button>
                                            <button class="btn btn-danger btn-sm">Refuser</button>
                                        </td>
                                    </tr>
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
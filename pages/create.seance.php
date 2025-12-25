<?php
session_start();
if (!$_SESSION) {
    header("location: ./login.php");
    exit();
}
require_once "../classes/seance.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Séance - CoachPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 600px;
            margin: 50px auto;
        }
        .btn-create {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
        }
        .btn-create:hover { opacity: 0.9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <div class="text-center mb-4">
                <i class="fas fa-dumbbell fa-3x text-success mb-3"></i>
                <h3 class="fw-bold">Créer une nouvelle séance</h3>
            </div>


            <form action="./seance.process.php" method="POST">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" ">
                </div>

                <div class="mb-3">
                    <label for="heure" class="form-label">Heure de début</label>
                    <input type="time" class="form-control" id="heure" name="heure" >
                </div>

                <div class="mb-3">
                    <label for="duree" class="form-label">Durée (en minutes)</label>
                    <select class="form-select" id="duree" name="duree" >
                        <option value="">Choisir une durée</option>
                        <option value="30">30 minutes</option>
                        <option value="45">45 minutes</option>
                        <option value="60" selected>60 minutes</option>
                        <option value="90">90 minutes</option>
                        <option value="120">120 minutes</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-create text-white fw-bold">
                        <i class="fas fa-plus me-2"></i>Creer une seance
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="dashboard.coach.php" class="text-muted">← Retour au dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
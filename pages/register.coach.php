<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body,
        html {
            height: 100%;
        }
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://via.placeholder.com/1920x1080?text=Fond+Sportif+Gym+Tennis+Football') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            max-height: 90vh;     /* Hauteur max pour éviter débordement */
            overflow-y: auto;     /* Défilement vertical si nécessaire */
        }
        .btn-register {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
        }
        .btn-register:hover {
            opacity: 0.9;
        }
        .logo {
            font-size: 3rem;
            color: #28a745;
        }
        .text-sport {
            color: #28a745;
        }
        @media (max-height: 800px) {
            .register-card {
                padding: 30px;
            }
            body {
                align-items: flex-start;
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card mx-auto">
            <div class="text-center mb-4">
                <i class="fas fa-dumbbell logo mb-3"></i>
                <h3 class="fw-bold">Inscrivez-vous sur <span class="text-sport">CoachPro</span></h3>
                <p class="text-muted">Créez votre compte pour commencer</p>
            </div>
            <form action="./register.coach.process.php" method="POST" id="registerForm">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="@email.com">
                </div>
                <div class="mb-3">
                    <label for="anneExp" class="form-label">Années d'expérience</label>
                    <input type="number" class="form-control" id="anneExp" name="anneExp" placeholder="Nombre d'années">
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio / Description</label>
                    <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Décrivez-vous..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="discipline" class="form-label">Discipline</label>
                    <select class="form-select" name="discipline" id="discipline">
                        <option value="football">Football</option>
                        <option value="tennis">Tennis</option>
                        <option value="box">Boxe</option>
                        <option value="martial">Arts martiaux</option>
                        <option value="musculation">Musculation</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="••••••••">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-register w-100 fw-bold">S'inscrire</button>
                <hr class="my-4">
                <div class="text-center">
                    <p>Déjà un compte ?
                        <a href="./login.php" class="text-sport fw-bold">Se connecter</a>
                    </p>
                </div>
                <div class="text-center">
                    <p>Vous cherchez un coach ?
                        <a href="./register.php" class="text-sport fw-bold">S'inscrire en tant que sportif</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
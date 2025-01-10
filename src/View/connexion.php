<?php
session_start();

require __DIR__ . '/../Model/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: accueil.php');
            exit(); 
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.logout.css"> 
</head>
<body>
    <div class="form-container">
        <h1>Connexion</h1>
        
        <?php if (isset($error)) : ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <br>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <br>
            <button type="submit">Se connecter</button>
        </form>

        <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a></p>
    </div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: connexion.php');
    exit();
}

require __DIR__ . '/../Model/Database.php';

try {
    $sql = "SELECT nom, detail, img_path FROM produits";
    $stmt = $pdo->query($sql);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des produits : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a>GUIKIT</a>
        <ul class="navbar-links">
            <li><a href="#">Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>

    <div class="products-grid">
        <?php foreach ($produits as $produit): ?>
            <div class="product">
                <img src="<?php echo htmlspecialchars($produit['img_path']); ?>" alt="Image de produit">
                <h3><?php echo htmlspecialchars($produit['nom']); ?></h3>
                <p><?php echo htmlspecialchars($produit['detail']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

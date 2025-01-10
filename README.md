Bonjour Monsieur,
Désolé pour le retard
voici mon rendu finale voici mes injection SQL
CREATE DATABASE application;
USE application;

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    detail TEXT NOT NULL,
    img_path VARCHAR(255) NOT NULL
);
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(50) NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produits (nom, detail, img_path) VALUES
('maillot du ac milan', 'C\'est le maillot de l Ac Milan', 'image/ac-milan-maillot.jpg'),
('maillot de lyon', 'C\'est le maillot de Lyon', 'image/lyon-maillot.jpg'),
('maillot de Liverpool', 'C\'est le maillot de Liverpool', 'image/liverpool-maillot.jpg'),
('maillot de Chelsea', 'C\'est le maillot de Chelsea', 'image/chealsea-maillot.jpg'),
('maillot de Dortmund', 'C\'est le maillot de Dortmund', 'image/dortmund-maillot.jpg');
pour les autres maillots c'est la même logique.

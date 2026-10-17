<?php
// Configuration de la base de données
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "projet"; // Remplace par le nom de ta base

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // 1. Vérifier si l'email existe
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // 2. L'email existe, on vérifie le mot de passe
        if ($password === $user['password']) {
            // SUCCESS
            echo "Connexion réussie ! Bienvenue rôle : " . $user['role'];
            // Ici tu peux rediriger vers ton interface :
            // header("Location: index.html"); 
        } else {
            // MOT DE PASSE FAUX
            echo "<script>alert('Mot de passe incorrect.'); window.history.back();</script>";
        }
    } else {
        // EMAIL NON TROUVÉ
        echo "<script>alert('Cet email n\'existe pas.'); window.history.back();</script>";
    }
}
?>
*/
<?php
$conn = mysqli_connect("localhost", "root", "", "projet");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if ($password === $user['password']) {
            echo "OK"; // Signal de succès
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Cet email n'existe pas.";
    }
}
mysqli_close($conn);
?>
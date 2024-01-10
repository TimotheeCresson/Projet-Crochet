<?php 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data (e.g., handle user registration)

    // Sample registration logic (replace with your actual logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform validation and database operations
    // ...

    // Redirect or display a success message
    header("Location: registration_success.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer type="module"></script>
</head>
<body>

<h2>Se connecter</h2>
<form method="post" action="">
    <label for="username">Identifiants ou email</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Se connecter</button>
</form>

<h2>Vous n'avez pas encore de compte?</h2>
<h3>Créez un compte</h3>

<form method="post" action="">
    <label for="identifiant">Identifiant</label>
    <input type="text" name="identifiant" required>

    
    <label for="email">Email</label>
    <input type="text" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>



    <button type="submit">Se connecter</button>
</form>

</body>
</html>

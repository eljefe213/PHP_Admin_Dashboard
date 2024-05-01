<?php
session_start();
if(!$_SESSION['password']){
    header('Location: connexion.php');
}
echo 'Welcome '.$_SESSION['username'].' in our website';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="deconnexion.php">
    <button>Deconnexion</button>
    </a>
</body>
</html>
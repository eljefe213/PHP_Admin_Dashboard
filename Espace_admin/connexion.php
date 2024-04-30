<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;','root','');
if(isset($_POST['connexion'])){
    if(!empty($_POST['username'] && $_POST['password'])){
        $username = htmlspecialchars($_POST['username']);
        $password = sha1($_POST['password']);

        $selectUser = $bdd->prepare('SELECT * FROM users WHERE user = ? AND password = ?');
        $selectUser->execute(array($username,$password));

        if($selectUser->rowCount()>0){

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $selectUser->fetch()['id'];
            echo $_SESSION['id'];
            header('Location: index.php');
        }else{
            echo "Your username or password is incorrect !! ";
        }

    }else{
        echo "Please complete all fields !! ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="" method="post" align="center">
        <input type="text" placeholder="Username" name="username">
        <br>
        <input type="password" placeholder="Password" name="password">
        <br><br>
        <button type="submit" name="connexion">Connexion</button>
    </form>
</body>
</html>
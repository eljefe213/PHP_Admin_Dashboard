<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;','root','');
if(isset($_POST['Login'])){
    if(!empty($_POST['user']) && !empty($_POST['password'])){
        $user = htmlspecialchars($_POST['user']);
        $password = sha1($_POST['password']);
        $insertUser = $bdd->prepare('INSERT INTO users(user,password) VALUES (?,?)');
        $insertUser->execute(array($user,$password));

        $selectUser = $bdd->prepare('SELECT * FROM users WHERE user= ? AND password= ?');
        $selectUser->execute(array($user,$password));

        if($selectUser->rowCount() > 0){
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $selectUser->fetch()['id'];
        }

        echo $_SESSION['id'];
    }else {
        echo "Please complete all fields !!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="post" action="" align="center">
        <input type="text" name="user" autocomplete="off">
        <br>
        <input type="password" name="password" autocomplete="off">
        <br><br>
        <input type="submit" name="Login">

    </form>
    
</body>
</html>
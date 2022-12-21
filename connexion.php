<?php
session_start();
if(isset($_POST['ok'])){
    $prenom=$_POST['prenom'];
    $password=$_POST['password'];
    if($prenom&&$password){
        $password=md5($password);
        @mysql_connect("localhost","root");
        $query=mysql_query("SELECT * FROM clients WHERE prenom='$prenom'&&password='$password'");
        $rows=@mysql_num_rows($query);
        if($rows==1){
            $_SESSION['prenom']=$prenom;
            header('Location:site.html');
        }
    }
    else{
        echo "Veuillez saisir tous les champs";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="connexion.php">
    <p>Prenom</p>
    <input type="text" name="prenom">
    <p>Passwd</p>
    <input type="password" name="password" ><br><br>
    <input type="submit" value="Connexion" name="ok">
    </form>
</body>
</html>
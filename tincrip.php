<?php
       if(isset($_POST['ok'])){
                 $prenom= htmlspecialchars($_POST['prenom']);  
                  $nom= htmlspecialchars($_POST['nom']); 
                  $adressemail= htmlspecialchars($_POST['adressemail']); 
                  $password=htmlspecialchars($_POST['password']);
                  $password2=htmlspecialchars($_POST['password2']);
                  $number= htmlspecialchars($_POST['number']);
                if($prenom&&$nom&&$adressemail&&$password&&$password2&&$number){
                  if($password==$password2){
                      $password=md5($password2);
                      echo "<p style='size:25px; color:green;'>Bienvenue <em style='color:red';>$prenom</em>  a notre site </p><br>";
                      @mysql_connect("localhost","root") or die("Error");
                      mysql_select_db("vente");
                      $reg=mysql_query("SELECT * FROM clients WHERE prenom='$prenom'");
                      $row=@mysql_num_rows($reg);
                      if($row==0){
                         $query=mysql_query("INSERT INTO clients VALUES('$prenom','$nom','$adressemail','$password','$number')");
                      die("Incription reussi </br><br>cliquez <a href='connexion.php'>ici<a/> pour vous connecter"); 
                      }
                      else{
                          echo "Ce client exite deja";
                      } 
                  }
                  else{
                      echo "Les deux mots de passe ne sont pas identiques";
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
    <style>
        body{
            background-imnom:url();
        }
        form{
            position: relative;
            left:2% ;
            padding: auto;
            background-color:aqua;
            border: 1px solid aqua;
            border-radius: 10px;
            width:220px;
            height: 450px;
        }
    </style>
</head>
<body>
    <form method="POST" action="tincrip.php">
    <p>Prenom</p>
    <input type="text" name="prenom">
    <p>nom<p>
    <input type="text" name="nom" >
    <p>Adressemail</p>
    <input type="mail" name="adressemail" >
    <p>Passwd</p>
    <input type="password" name="password" >
    <p>RPassword</p>
    <input type="password" name="password2" ><br><br>
    <p>Numero telephone</p>
    <input type="number" name="number" >
    <input type="submit" value="ok" name="ok">
    </form>
</body>
</html>
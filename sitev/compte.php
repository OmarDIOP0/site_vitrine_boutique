<?php
 if(isset($_POST['ok'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['adressmail']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['number'])){
           $prenom= htmlspecialchars($_POST['prenom']);
           $nom= htmlspecialchars($_POST['nom']);
           $adressmail= htmlspecialchars($_POST['adressmail']);
           $password= htmlspecialchars($_POST['password']); 
           $password2= htmlspecialchars($_POST['password2']); 
           $number= htmlspecialchars($_POST['number']);
           if($password==$password2){
               echo "Bienvenue $prenom  a notre site.Cliquez <a href='compte.html'>ici<a/> pour vous connectez";
               $password=md5($password2);
               mysql_connect("localhost","root") or deie("Error");
               mysql_select_db("vente");
               $reg=mysql_query("SELECT * FROM clients WHERE prenom='$prenom'");
               $row=mysql_num_rows($reg);
               if($row==0){
                  $query=mysql_query("INSERT INTO clients VALUES('$prenom','$nom','$adressmail','$password','$number')");
               die("Incription reussi"); 
               }
               else{
                   echo "Ce client exite deja";
               }
               
           }
           else{
               echo "Les deux mots de passe ne sont pas identiques";
           }
        }
     }
else{
      echo "Veuillez saisir tous les champs";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Site de Vente en ligne</title>
        <link rel="stylesheet" href="homme.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <style>
body{
    font-family: century gothic;
    margin: 0px;
    padding: 0px;
    background-color: rgb(176, 202, 193);
}
nav{
  display: flex;
  justify-content: space-between;
  padding: 20px;
  position: sticky;
  top:0px;
  background-color: aliceblue;
}
nav h1{
  font-size: 20px;
  text-decoration: none;
  cursor: pointer;
}
nav .div-1{
  display: flex; 
}
nav .div-1 p{
  font-size: 15px;
  margin-right: 15px;
  cursor: pointer;
  
}
nav .div-1 p a{
  text-decoration: none;
  color:black;
}
nav .div-1 p a:hover{
  color: aqua;
}
nav .div-1 input{
  margin: 3px 15px;
  padding: 15px;
  border-radius: 25px;
  border: none;
  outline: none;
  background-color: aqua;
}
header h2{
    font-size: 20px;
}
.title,.price{
    font-size: 15px;
    color:aqua;
}
.form1{
    width: 300px;
    height: 200px;
    border-radius: 30px;
}
.form1 #mail,#password,#password2{
margin-bottom: 40px;
width: 300px;
border: none;
background-color: transparent;
border-bottom: 1px solid black;
outline: none;
font-size: 20px;
}
.form1 input[type=submit], input[type=reset]{
width: 100px;
height: 30px;
background-color: aqua;
border: none;
margin-right: 40px;
cursor: pointer;
}
section h3{
    font-size: 20px;
}
.form2{
width: 300px;
height: 200px;
padding:20px 10px;
}
.form2 #nom,#prenom,#number,#adressemail,#password2{
margin-bottom: 40px;
width: 300px;
border: none;
background-color: transparent;
border-bottom: 1px solid black;
outline: none;
font-size: 20px;
}
.form2 input[type=submit]{
width: 150px;
height: 30px;
background-color: aqua;
border: none;
margin-right: 40px;
cursor: pointer;
}
footer{
    margin-top:100px;
    background-color:aliceblue;
    display: flex;
    justify-content: space-between;
    padding: 30px;
}
footer .social{
    display: flex;
}
footer .social p{
    margin-right: 20px;
    border: 2px solid aqua;
    border-radius: 75%;
    padding: 5px;
    width: 10px;
    cursor: pointer;
}

        </style>
    </head>
    <body>
        <nav>
            <h1> <a href="site.html">Sante Yalla Boutique</a></h1>
            <div class="div-1">
                <p><a href="site.html">Acceuil</a></p>
                <p class="p1"><a href="homme.html">Hommes</a></p>
                <p class="p1"><a href="femme.html">Femmes</a></p>
                <p class="p1"><a href="enfant.html">Enfants</a></p>
                <p class="p1"><a href="compte.html"><i class="fas fa-user-alt"></i> Se connecter</a></p>
                <form>
                    <input type="search" placeholder="Rechercher">
                </form>
                <p><i class="fas fa-store"></i></p>
                <p><i class="fas fa-shopping-cart"></i></p>
            </div>
        </nav>
        <header>
           <h2>Se connecter</h2>
           </header>
           <section>
                        <form class="form1">
                            <input type="email" id="mail" name="mail" placeholder="Email" required><br>
                            <input type="password" id="password" name="password" placeholder="Mot de passe" required><br>
                            <input type="submit" value="Envoyer">
                            <input type="reset" value="Annuler"><br><br>
                        </form>
                        <h3>Creer un compte</h3>
                           <form class="form2" method="post" action="compte.php">
                                   <input type="text" id="prenom" name="prenom" placeholder="Prénom"><br>
                                   <input type="text" id="nom" name="nom" placeholder="Nom"><br>
                                   <input type="email" id="adressemail" name="Adressemail" placeholder="Adressemail"><br>
                                   <input type="password" id="password" name="password" placeholder="Mot de passe"><br>
                                   <input type="password" id="password2" name="password2" placeholder="Reessayer votre mot de passe"><br>
                                   <input type="tel" id="number" name="number" placeholder="Numéro de telephone">
                                   <input type="radio" name="sexe">
                                   <label for="sexe">Masculin</label>
                                   <input type="radio" name="sexe">
                                   <label for="sexe">Feminin</label><br><br>
                                   <input type="submit" value="Creer un compte" name="ok">
                           </form>

            
            </section><br><br><br><br><br><br><br>
            <footer>
                <p>&copy;Veuillez nous contactez au 76 291 91 45</p>
                <div class="social">
                    <p><i class="fab fa-instagram-square"></i></p>
                    <p><i class="fab fa-facebook-square"></i></p>
                    <p><i class="fab fa-twitter-square"></i></p>
                </div>
            </footer>
    </body>
</html>
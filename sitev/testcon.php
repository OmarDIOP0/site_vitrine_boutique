<?php
 if(isset($_POST['ok'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['adressmail']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['number'])){
           $prenom= htmlspecialchars($_POST['prenom']);
           $nom= htmlspecialchars($_POST['nom']);
           $adressmail= htmlspecialchars($_POST['adressmail']);
           $password= htmlspecialchars($_POST['password']); 
           $password2= htmlspecialchars($_POST['password2']); 
           $number=htmlspecialchars($_POST['number']);
           if($password==$password2){
               $password=md5($password2);
               echo "Bienvenue $prenom  a notre site.Cliquez <a href='compte.html'>ici<a/> pour vous connectez"
               mysql_connect("localhost","root") or die("Error");
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
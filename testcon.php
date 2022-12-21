<?php
       if(isset($_POST['ok'])){
            $prenom= htmlspecialchars($_POST['prenom']);  
                  $age= htmlspecialchars($_POST['age']); 
                  $mdp1=htmlspecialchars($_POST['mdp1']);
                  $mdp2=htmlspecialchars($_POST['mdp2']);
                if($prenom&&$age&&$mdp1&&$mdp2){
                  if($mdp1==$mdp2){
                      $mdp1=md5($mdp2);
                      echo "<br>Bienvenue $prenom  a notre site <br><br>";
                      echo "Cliquez <a href='connexion.php'>ici<a/> pour vous connectez";
                      @mysql_connect("localhost","root") or die("Error");
                      mysql_select_db("vente");
                      $reg=mysql_query("SELECT * FROM clients WHERE prenom='$prenom'");
                      $row=@mysql_num_rows($reg);
                      if($row==0){
                         $query=mysql_query("INSERT INTO clients VALUES('$prenom','$age','$mdp1')");
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
      else{
             echo "Veuillez saisir tous les champs";
       }
    
}
    ?>
</body>
</html>
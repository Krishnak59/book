<body>
<form method="post" action="mur.php" enctype="multipart/form-data">
    <textarea name="message" rows="4" cols="70"  placeholder="Exprimez-vous ! "></textarea>
    <input type="file" name="nom" />
    
    <p><input type="submit" value="valider" />
</form>

<?php
session_start();
include"entetePage.php";
include("../model/connexionBdd.php"); // On inclus la page de connexion a la bdd

 $mail=$_SESSION['mail'];


$req="select * from elements e join utilisateur u
                on e.id_utilisateur=u.id
                order by date desc";

$rep = $bdd->prepare($req);
$rep->execute();



while ($row= $rep->fetch()) {
   
echo "<p>";
           echo $row['prenom']." ".$row["nom"];
           echo"<br />";
           echo $row['contenu'];
           echo  "<br />";
           echo $row['date'];
            echo  "<br />";
         echo "j'aime"."commente"."commente";  
echo "</p>";
          
  
           
   
    
    
//echo"Le ".$row['date']."< ".$row['prenom']." > ";
  //echo $row['contenu']."</br>";
 
    
}


        
if(isset($_POST['message']) && !empty($_POST['message']))
{
    $bdd = new PDO('mysql:host=localhost;dbname=book','root', 'mysql');
    $query1 = $bdd->prepare('SELECT *
                               FROM utilisateur 
                                       WHERE mail= :mail');

    $query1->bindValue(':mail', $mail, PDO::PARAM_STR);
    $query1->execute();
    $data1 = $query1->fetch();

    $id = $data1['id'];

    $mess = $_POST['message'];

    $query = $bdd->prepare("insert into elements(contenu,id_utilisateur,date)
                    values(:mess,:id,CURRENT_TIMESTAMP) ");

    $query->bindValue('mess', $mess, PDO::PARAM_STR);
    $query->bindValue('id', $id, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    header("Location: mur.php");
}



?>
</body>
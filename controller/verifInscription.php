    <?php
     include("../model/connexionBdd.php");
     include("../classes/Membres.php");

    include("../model/requeteInscription.php");
   
     

$prenom=htmlentities( $_POST['prenom']);
$nom=htmlentities( $_POST['nom']);
$mail=htmlentities( $_POST['mail']);
$mailVerif=htmlentities( $_POST['mailVerif']);
$mdp=sha1( $_POST['mdp']);
$jour= $_POST['jour'];
$mois= $_POST['mois']+1;
$annee= $_POST['annees'];
$sexe=$_POST['gender'];
        
$mois=sprintf('%02d', $mois);
$jour=sprintf('%02d', $jour);

$date=$annee."-".$mois."-".$jour;

$unMembre=new Membres($mail,$nom,$prenom,$mdp,$date,$sexe);

if($mail ==$mailVerif)
{
    $mail=$mailVerif;


    $verif=verifMail($mail,$bdd);
    echo $verif;
    if ($verif >0 )
    {

       echo $mail." @mail deja existante";
    }
    else 
    {
        $unMembre->ajouterMembre($bdd);
        header('Location: ../vues/index_conn_ok.php');
    }

  
}
else
{
    echo 'adresse mail diffente';
}


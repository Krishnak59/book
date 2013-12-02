<?php
session_start(); // On debute la session
include"vues/entetePage.php";
include_once "model/connexionBdd.php"; // On inclus la page de connexion a la bdd


if (isset($_SESSION['login']) && $_SESSION['login'] != '') // Si on est déja connecté on va au menu
{ 
    header('Location: index_conn_ok.php');
} 
else 
{ // Sinon page de connexion
?>
   <body>
     <!-- Formulaire de connexion -->
 <h2>Connexion</h2>
<form method='post' name='connect' action='controller/verifLogin.php'>
   <p>
    <label for='mailCo'><b>Identifiant </b></label>
    <input type='text' id='mailCo' name='mailCo'>
   </p>
    <p>
    <label for='mdpCo'><b>Mot de passe </b></label>
    <input type='password' id='mdpCo' name='mdpCo'>
   </p>
   <input type='submit' name='submit' value='Connexion'>
</form>


      <!-- Formulaire d'inscription -->
      
<h1>Cr&eacuteer un compte (gratuit)</h1>

<form method='post' name='inscription' action='controller/verifInscription.php'>

<p>
    <input type='text' name='prenom'  placeholder='prenom' required>
    <input type='text' name='nom' placeholder='Nom de famille' required>
</p>  
<p>
    <input type='email' name='mail' placeholder='Votre adresse electronique' required>
</p>
<p>
    <input type='email' name='mailVerif' placeholder='Confirmer votre adresse electronique' required>
</p>
<p>
    <input type='password' name='mdp' placeholder='Nouveau mot de passe' required>
</p>
<p>
  Date de Naissance
</p>
<p>
    <select name="jour" required>
    <option value="">jour</option>
    <?php
    for($i=0; $i<=31; $i++)
    {

    // Affichage de la ligne
    echo '<option value="'.$i.'">'.$i.'</option>';

    }
    ?>
    </select>

        <!-- Choix Mois -->


    <select name="mois" required>
    <option value="">Mois</option>
    <?php
       $mois=array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");

    for($i=0; $i<count($mois); $i++)
    {
        // Affichage de la ligne
        echo '<option value="'.$i.'">'.$mois[$i].'</option>';
    }

    ?>
     <!-- Choix année -->
    </select>



    <select name="annees" required>
    <option value="">Annee</option>

    <?php
    $selected = '';
    for($i=1905; $i<=  date('Y'); $i++)
    {


    // Affichage de la ligne
    echo '<option value="', $i ,'"', $selected ,'>', $i ,'</option>';
    // Remise à zéro de $selected
    $selected='';
    }

    ?>

    </select>
</p>

<p>
    <Input type = 'Radio' Name ='gender' value='homme'required>M
    <Input type = 'Radio' Name ='gender' value= 'female'>F
</p>
 
<input type='submit' name='submit' value='Inscription'>
</form>

</body>
</html>
   <?php
}

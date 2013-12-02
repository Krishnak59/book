<?php
//include "connexion.php";
session_start();
echo $login=$_SESSION['nom'];

echo $id=$_SESSION["id"];
if(isset($_SESSION['nom']) && $_SESSION['nom'] !='') // Si on est bien connecté
{
	
	
	
	
	echo "<html>";
		echo "<head>";
			echo "<title>accueil</title>";
			echo "<LINK rel='stylesheet' type='text/css' href='style.css'>";
		echo "</head>";
		echo "<body>";

		echo "Connecté en tant que - <b>$login</b> / <a href='logout.php'>Déconnexion</a>";

		echo "<table border='1' align='center' class='tabmenu'>";
			
			echo "<tr class='titremenu'>";
				echo "<td>";
					echo "<h1>Welcome</h1>"; //Titre du site
				echo "</td>";
			echo "</tr>";
                        echo'</table>';
                        echo'
                        
  <menu type="toolbar">
<li>

<A HREF="messagesprives">Mes messages</A> 

</li>


<li>
<A HREF="mur.php">Mon mur</A> 
</li>
<li>
<A HREF="messagesprives">Fils de l\actualité </A> 
</li>
</menu>';


}
else
{
    echo'pas co';
}
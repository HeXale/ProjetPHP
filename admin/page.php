<?php

//inclusion du fichier qui contient les fonctions
include("../include/fonctions.inc.php");

//appel de la fonction pour construire le début de la page
debut_html();

if (isset ($_GET['num']))
	{
	$num = ($_GET['num']);
	

//////////////////////////////////////

include("../include/connexion.inc.php");
$idcom=connexion("ProjetPHP","parametre_connec");

//requete 
$requete="SELECT * FROM page WHERE numero = '".$num."'";
$result=@mysql_query($requete,$idcom);

$nb_col=mysql_num_fields($result);
$nb_ligne=mysql_num_rows($result);


	$ligne=mysql_fetch_row($result);
	for($j=0;$j<$nb_col;$j++)
		$ligne[$j];	
	$numero=$ligne[0];
	$titre=$ligne[1];
	$contenu=$ligne[2];
	if (isset($contenu) || isset($titre)||isset($numero)) $remplacer=true;
	else $remplacer=false;

echo"		<form name='test' action='enregistrement.php?num=$num&&remplacer=$remplacer' method='POST'>
				<textarea  name='texte' cols='50' rows='20' id='myarea1' class='mceEditor'>";
					if (isset($contenu)) echo $contenu;
					echo "	
				</textarea>
				<input type='submit' value='Vérification des mises à jour'>
			</form>";
}
else echo "selectionner un item du menu";
//appel de la fonction pour construire la fin de la page
fin_html();

?>

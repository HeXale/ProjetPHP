<?php

//inclusion du fichier qui contient les fonctions
include("../include/fonctions.inc.php");

//appel de la fonction pour construire le début de la page
debut_html();

if (isset ($_GET['num']))
	{
	$num = ($_GET['num']);
	}
	

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
	
	
echo"<FONT color='#CC0000'>". $contenu ."</FONT>";
//appel de la fonction pour construire la fin de la page
fin_html();

?>
	
<?php

	include("../include/fonctions.inc.php");
	include("../include/connexion.inc.php");
	$idcom=connexion("ProjetPHP","parametre_connec");

	if (isset ($_GET['num']))
		{
		$num = ($_GET['num']);
		}
	if (isset ($_GET['remplacer']))
		{
		$remplacer = ($_GET['remplacer']);
		}
		
	
	
	$numero=$num;
	$titre=addslashes($_POST['titre']);
	$contenu=addslashes($_POST['texte']);
	
	
	if(!$remplacer){

		$requete = "INSERT INTO page VALUES ('".$numero."', '".$titre."', '".$contenu."');";
		
		}else{
			
		
			$requete="UPDATE page SET titre='".$titre."',contenu='".$contenu."' WHERE  numero = '".$num."'";
			
			
			echo "Votre contenu à bien été mis à jour";
			header("refresh:3;page.php?num=" . $num);

		};
	
	
	
	$result=mysql_query($requete,$idcom);

	if(!$result){
	
		 echo "Erreur d'insertion";
	
		}else{
			
			redirection("page.php");
		
		}
	//arret de la connexion à la base
	mysql_close($idcom);

?>

<?php 

	$idcom=connexion("ProjetPHP","parametre_connec");

	$num = ($_GET['num']);
	$numero=$num;
	$titre=$_POST['titre'];
	$contenu=$_POST['texte'];

	echo $numero;

	/*echo utf8_decode( 'Votre contenu à bien été mis à jour' );
	**header('refresh:3;page.php?num='.$num);
	*/
 ?>
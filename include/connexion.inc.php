<?php
function connexion($base,$param){
	include_once($param.".inc.php");
	$idcom=mysql_connect(MYHOST,MYUSER,MYPASS);
	$idbase=mysql_select_db($base); 
	if (!$idcom || !$idbase) {
		echo " probleme de connexion ";
		}
//else echo "ca marche";
//echo $idcom;
	return $idcom;
}
?>

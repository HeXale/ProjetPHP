<?php
// affichage de l'entête HTML,  fonctions d'affichage de la sortie HTML
function debut_html($titre="page n°") {
echo "
<html>
	<head>
	<TITLE>Tatanation</TITLE>
	<link rel='stylesheet' type='text/css' href='styles.css' >
	<script language='javascript' type='text/javascript' src='../javascript/tinymce/js/tinymce/tinymce.js'></script>
	<script language='javascript' src='../javascript/menu.js'></script>
	<script language='javascript' type='text/javascript'>
	tinymce.init({
  selector: 'textarea',
  height: 200,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
	</script>
	<style>
	<!--
	.itemText { text-decoration: none; color: #CC0000; font: 12px Arial; font-weight: Bold }
	.crazyBorder { border: 2px outset #FF6600 }
	.crazyText { text-decoration: none; color: #003366; font: 12px Arial}
	.textAlign {center}
	-->
	</style>
	
	</head>
";
echo "<body bgcolor='#000'onLoad='writeMenus()'>";
echo"
<table width='70%' height='50%' border='0'>
		<tr>
			<td align='center'  width='200'><img src='../images/Tata.jpeg' width='50%'/></td>
			<td width='700' height='20'><FONT color='#CC0000' size='22'><b>Bienvenue sur le site de la TataNation</b></FONT></td>
		</tr>
		<tr>
			<td></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br> </br> </br> </br> </br></br></br></br></br></br> </br> </br> </br> </br></br></br></br> 
			</td>
			<td>
" ;
}
// affichage de la fin de la sortie HTML
function fin_html() {
echo"</td>
		</tr>
		<tr>
			<td></td>
			<td align='center'><FONT color='#CC0000'> Derni&egrave;re mise &agrave; jour le " . date('d/m/Y') . "</FONT></td>
			

		</tr>
	</table>";
echo "
</body>";


		$fp = fopen("compteur.txt","r+"); 
		$nbvisites = fgets($fp,10); 
		if ($nbvisites=="") $nbvisites = 0; 
		$nbvisites++; 
		fseek($fp,0); 
		fputs($fp,$nbvisites); 
		fclose($fp); 
		echo "<FONT color='#CC0000'> Nombre de visiteurs :". $nbvisites ."</FONT>";

 
}
?>
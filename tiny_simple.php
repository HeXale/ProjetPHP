<?php
//include("fonctions/connexion.inc.php");
//connexion("site_web","parametre_connec");

echo "<html>
	<head>
	<link rel='stylesheet' type='text/css' href='styles.css' >

	<script language='javascript' src='menu1.js'>
	</script>
	
	<style type='text/css'>
		<!--
		A:hover {color:#CC0000;text-decoration: none }
		A:active {text-decoration: none; color: #CC3333}
		-->
	</style>
	<script language='javascript' type='text/javascript' src='tinymce/js/tinymce/tinymce.js'></script>
	<script language='javascript' type='text/javascript'>
			tinymce.init({
  selector: 'textarea',
  height: 500,
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
	
	</head>   

<body bgcolor='#FFFFFF' onLoad='writeMenus()'>

<form name='test' action='suite.php' method='POST'>
	<textarea  name='texte' cols='50' rows='20' id='myarea1' class='mceEditor'>";
if (isset($texte_html)) echo $texte_html;
echo "	</textarea>
	</textarea>
	<input type='submit' value='Vérification des mises à jour'>
</form>
	
	</body>

</html>
";
?>

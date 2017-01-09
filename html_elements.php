<?php
	function htmlFormHeader() {
		$html = "
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset=\"UTF-8\">
				<title>LPRO DASI PHP</title>
				<link rel=\"stylesheet\" type=\"text/css\" href=\"css/index.css\">
			</head>
			<body>
		";

		echo $html;
	}

	function htmlFormFooter() {
		$html = "
			</body>
		</html>
		";

		echo $html;
	}

	function htmlFormBody(){
		$html = "
			<div class=\"login\">
				<div class=\"login-triangle\"></div>
				 
				<h2 class=\"login-header\">Log in</h2>
				<form class=\"login-container\" action=\"check.php\" method=\"post\">
					<p><input type=\"username\" placeholder=\"Username\" name=\"username\"></p>
					<p><input type=\"password\" placeholder=\"Password\" name=\"password\"></p>
					<p><input type=\"submit\" value=\"Log in\"></p>
				</form>
			</div>
		";

		echo $html;
	}

	function htmlClassicHeader() {
		$html = "
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset=\"UTF-8\">
				<title>LPRO DASI PHP</title>
				<link rel=\"stylesheet\" type=\"text/css\" href=\"css/main.css\">
			</head>
			<body>
				<nav>
		            <ul>
		                <li><a id=\"nav-home\" href=\"home.php\">Accueil</a></li>
		                <li><a id=\"nav-modif\" href=\"modification.php\">Modification</a></li>
		                <li><a id=\"nav-create\" href=\"creation.php\">Création</a></li>
		                <li><a id=\"nav-users\" href=\"users.php\">Utilisateurs</a></li>
		                <li><a id=\"nav-upload\" href=\"upload.php\">Import</a></li>
		                <li class=\"right\"><a href=\"bye.php\">Déconnexion</a></li> 
		            </ul>
		        </nav>

		        <div class=\"container\">
			";

		echo $html;
	}

	function htmlClassicFooter() {
		$html = "
					</div>

					<div class=\"footer-rel\">
		            © Alexandre BAPTISTE &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Tous droits réservés &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <img src=\"img/Iutlehavre.gif\" alt=\"Logo IUT Le Havre\">
		        </div>
		    </body>
		</html>
		";

		echo $html;
	}
?>
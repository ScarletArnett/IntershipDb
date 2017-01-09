<?php
	include "db.php";
	include "html_elements.php";
	session_start();	

	if(!isset($_SESSION['username'])){
		header('Location: index.php');
	} else {		
		htmlClassicHeader();
		htmlClassicContent();
		htmlClassicFooter();
		echo "
		<script type=\"text/javascript\">
			document.getElementById(\"nav-create\").className = \"active\";
		</script>";
	}

	if (!empty($_GET['success'])) {
		$line = isset($_GET['success']) ? ($_GET['success']) : '';
		echo "
    	<script type=\"text/javascript\">
            alert(\"Requête validée !\");
    	</script>";
	} 

	function htmlClassicContent(){

		$request = isset($_GET['request']  ) ? $_GET['request'] : ''    ;

		echo "
	    <div class=\"login\">
	        <div class=\"login-triangle\"></div>
	      
	        <h2 class=\"login-header\">SAISIE</h2>
	        <form class=\"login-container\" action=\"creation.php\" method=\"get\"  enctype=\"multipart/form-data\">
	            <p><textarea name=\"request\" placeholder=\"INSERT INTO users (username, password) VALUES ('secondAdmin','admin'); \" rows=\"5\" cols=\"47\">" . $request . "</textarea> </p>
	            <p><input type=\"submit\" name=\"Submit\" value=\"Valider\" /></p>
	        </form>
	        <p style=\"color:red; font-size:0.80em;\">Utilisable pour une saisie manuelle (ex: INSERT, UPDATE)</p>
	    </div>
	     ";

		if (!empty($request)) {
			echo "<p style='color: #7f0000'>Votre dernière requête: ". $request. "</p>";
			$db = new DB();
			$result = $db->selectRequest($request);
			header('Location: creation.php?success=1');			
		 	$db->close();
		}
	 	echo "</div>";

	}

?>
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
			document.getElementById(\"nav-users\").className = \"active\";
		</script>";
	}

	function rand_string( $length ) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    return substr(str_shuffle($chars),0,$length);
	}


	function htmlClassicContent(){

		echo "
		<table>
            <thead align=\"center\">
                <th id=\"1\"><a href=\"users.php?order=1\">UTILISATEURS </a></th>
                <th id=\"2\"><a href=\"users.php?order=2\">MOT DE PASSE </a></th>
            </thead>
            <tbody>
        "; 

        $username   = isset($_GET['username']  ) ? $_GET['username'] : ''    ;
        $password   = isset($_GET['password']  ) ? $_GET['password'] : ''    ;
        $delete     = isset($_GET['delete']  )   ? $_GET['delete'] : ''      ;
        $id         = isset($_GET['id']  )       ? $_GET['id'] : ''          ;



        switch (isset($_GET['order']) ? ($_GET['order']) : '') {
			case 1:
				$request = "SELECT id, username, password FROM users ORDER BY username";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(1).className = \"active\";
				</script>"
				;
				break;
			case 2:
				$request = "SELECT id, username, password FROM users ORDER BY password";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(2).className = \"active\";
				</script>"
				;
				break;
			default:
				$request = "SELECT id, username, password FROM users ORDER BY id";
				break;
		}

		$db = new DB();
		$result = $db->selectRequest($request);

		if($username != NULL ){
			$password = rand_string(9);
			$db->importUser($username,$password);
			header("Location: users.php");
		}
		if($delete !=NULL ){
			$db->deleteUser($delete);
			header("Location: users.php");
		}

		foreach ($result as $row) {
			echo "
				<tr>
					<td align=\"center\"> ". $row['username'] ."</td>
					<td align=\"center\"> ". $row['password'] ."</td>
					<form action=\"users.php\" method=\"get\">
						<td style=\"display:none;\"><input type=\"hidden\" name=\"delete\" value=\"". $row['id'] ."\"></td>
						<td><input type=\"submit\" value=\"Supprimer\"></td>
					</form>
				</tr>
			";
		}

		echo "
		<tr>
			<form action=\"users.php\" method=\"get\">
				<td align=\"center\"><input name=\"username\" value=\"\"></td>
				<td align=\"center\"><strong><em>Mot de passe généré automatiquement</em></strong></td>
				<td><input type=\"reset\" value=\"Effacer\"></td>
				<td><input type=\"submit\" value=\"Valider\"></td>
			</form>
		</tr>
		";

		echo "
			</tbody>
        </table>
		";
          
		$db->close();  
	}

?>
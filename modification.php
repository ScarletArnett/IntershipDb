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
			document.getElementById(\"nav-modif\").className = \"active\";
		</script>";
	}

	if (!empty($_GET['success'])) {
		$line = isset($_GET['success']) ? ($_GET['success']) : '';
		echo "
    	<script type=\"text/javascript\">
            alert(\"". $line ." ligne(s) implémentée(s).\");
    	</script>";
	} 

	function htmlClassicContent(){

		echo "
		<table>
            <thead align=\"center\">
                <th id=\"1\"><a href=\"home.php?order=1\">ENTREPRISE </a></th>
                <th id=\"2\"><a href=\"home.php?order=2\">ADRESSE 1  </a></th>
                <th id=\"3\"><a href=\"home.php?order=3\">ADRESSE 2  </a></th>
                <th id=\"4\"><a href=\"home.php?order=4\">CODE POSTAL</a></th>
                <th id=\"5\"><a href=\"home.php?order=5\">VILLE      </a></th>
                <th id=\"6\"><a href=\"home.php?order=6\">CIVILITÉ   </a></th>
                <th id=\"7\"><a href=\"home.php?order=7\">RESPONSABLE</a></th>
                <th id=\"8\"><a href=\"home.php?order=8\">TÉLÉPHONE  </a></th>
                <th id=\"9\"><a href=\"home.php?order=9\">EMAIL      </a></th>
            </thead>
            <tbody>
        "; 

        $business_name    = isset($_GET['business_name']  ) ? $_GET['business_name'] : ''    ;
        $adress_one    = isset($_GET['adress_one']  ) ? $_GET['adress_one'] : ''    ;
        $adress_two   = isset($_GET['adress_two']  ) ? $_GET['adress_two'] : ''    ;
        $zipcode   = isset($_GET['zipcode']  ) ? $_GET['zipcode'] : ''    ;
        $city    = isset($_GET['city']  ) ? $_GET['city'] : ''    ;
        $gender    = isset($_GET['gender']  ) ? $_GET['gender'] : ''    ;
        $manager    = isset($_GET['manager']  ) ? $_GET['manager'] : ''    ;
        $phone    = isset($_GET['phone']  ) ? $_GET['phone'] : ''    ;
        $mail    = isset($_GET['mail']  ) ? $_GET['mail'] : ''    ;
        $delete    = isset($_GET['delete']  ) ? $_GET['delete'] : ''    ;
        $id   = isset($_GET['id']  ) ? $_GET['id'] : ''    ;



        switch (isset($_GET['order']) ? ($_GET['order']) : '') {
			case 1:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY business_name";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(1).className = \"active\";
				</script>"
				;
				break;
			case 2:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY adress_one";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(2).className = \"active\";
				</script>"
				;
				break;
			case 3:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY adress_two";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(3).className = \"active\";
				</script>"
				;
				break;
			case 4:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY zipcode";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(4).className = \"active\";
				</script>"
				;
				break;
			case 5:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY city";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(5).className = \"active\";
				</script>"
				;
				break;
			case 6:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY gender";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(6).className = \"active\";
				</script>"
				;
				break;
			case 7:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY manager";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(7).className = \"active\";
				</script>"
				;
				break;
			case 8:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY phone";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(8).className = \"active\";
				</script>"
				;
				break;
			case 9:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY mail";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(9).className = \"active\";
				</script>"
				;
				break;
			default:
				$request = "SELECT id, business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail FROM intership_list ORDER BY id";
				break;
		}

		$db = new DB();
		$result = $db->selectRequest($request);

		if($business_name != NULL ){
			$db->import($business_name,$adress_one,$adress_two,$zipcode,$city,$gender,$manager,$phone,$mail);
			header("Location: modification.php");
		}
		if($delete !=NULL ){
			$db->delete($delete);
			header("Location: modification.php");
		}

		foreach ($result as $row) {
			echo "
				<tr>
					<td> ". $row['business_name'] ."</td>
					<td> ". $row['adress_one']    ."</td>
					<td> ". $row['adress_two']    ."</td>
					<td> ". $row['zipcode']       ."</td>
					<td> ". $row['city']          ."</td>
					<td> ". $row['gender']        ."</td>
					<td> ". $row['manager']       ."</td>
					<td> ". $row['phone']         ."</td>
					<td> ". $row['mail']          ."</td>
					<form action=\"modification.php\" method=\"get\">
						<td style=\"display:none;\"><input type=\"hidden\" name=\"delete\" value=\"". $row['id'] ."\"></td>
						<td class=\"delete\"><input type=\"submit\" value=\"Supprimer\"></td>
					</form>
				</tr>
			";
		}

		echo "
		<tr>
			<form action=\"modification.php\" method=\"get\">
				<td><input name=\"business_name\" value=\"\"></td>
				<td><input name=\"adress_one\" value=\"\"></td>
				<td><input name=\"adress_two\" value=\"\"></td>
				<td><input name=\"zipcode\" value=\"\"></td>
				<td><input name=\"city\" value=\"\"></td>
				<td><input name=\"gender\" value=\"\"></td>
				<td><input name=\"manager\" value=\"\"></td>
				<td><input name=\"phone\" value=\"\"></td>
				<td><input name=\"mail\" value=\"\"></td>
				<td class=\"erased\"><input type=\"reset\" value=\"Effacer\"></td>
				<td class=\"validate\"><input type=\"submit\" value=\"Valider\"></td>
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
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
			document.getElementById(\"nav-home\").className = \"active\";
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
                <th style=\"color: white\">INFORMATIONS</th>
            </thead>
            <tbody>
        ";       

        switch (isset($_GET['order']) ? ($_GET['order']) : '') {
			case 1:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY business_name";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(1).className = \"active\";
				</script>"
				;
				break;
			case 2:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY adress_one";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(2).className = \"active\";
				</script>"
				;
				break;
			case 3:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY adress_two";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(3).className = \"active\";
				</script>"
				;
				break;
			case 4:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY zipcode";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(4).className = \"active\";
				</script>"
				;
				break;
			case 5:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY city";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(5).className = \"active\";
				</script>"
				;
				break;
			case 6:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY gender";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(6).className = \"active\";
				</script>"
				;
				break;
			case 7:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY manager";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(7).className = \"active\";
				</script>"
				;
				break;
			case 8:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY phone";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(8).className = \"active\";
				</script>"
				;
				break;
			case 9:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY mail";
				echo "
				<script type=\"text/javascript\">
					document.getElementById(9).className = \"active\";
				</script>"
				;
				break;
			default:
				$request = "SELECT business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info FROM intership_list ORDER BY id";
				break;
		}

		$db = new DB();
		$result = $db->selectRequest($request);

		foreach ($result as $row) {
			echo "
				<tr>
					<td align=\"center\"> ". $row['business_name'] ."</td>
					<td align=\"center\"> ". $row['adress_one']    ."</td>
					<td align=\"center\"> ". $row['adress_two']    ."</td>
					<td align=\"center\"> ". $row['zipcode']       ."</td>
					<td align=\"center\"> ". $row['city']          ."</td>
					<td align=\"center\"> ". $row['gender']        ."</td>
					<td align=\"center\"> ". $row['manager']       ."</td>
					<td align=\"center\"> ". $row['phone']         ."</td>
					<td align=\"center\"> ". $row['mail']          ."</td>
					<td align=\"center\"> ". $row['info']          ."</td>
				</tr>
			";
		}

		echo "
			</tbody>
        </table>
		";
          
		$db->close();  
	}

?>
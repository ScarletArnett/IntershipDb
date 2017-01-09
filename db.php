<?php	
	class DB {

		protected $db;

		public function DB(){
			try {
				$conn = new PDO("mysql:host=localhost;dbname=php_project", "root", "");
            	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				
			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
			$this->db = $conn;
		}
		
		public function close(){
			$this->db = null;
		}
		

		public function identification($username, $password) {
			$stmt = $this->db->prepare("SELECT id FROM users WHERE username=? AND password=?");
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $password);
			
			if($stmt->execute()) {
				if($stmt->rowCount()){
					session_start();
        			$_SESSION['username'] = htmlentities($username);
        			header("Location: home.php");
				} else {
					echo "Failed.";
				}
			}
		}

		public function selectRequest($request){
			return $this->db->query($request);
		}

		public function import($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10){
			$stmt = $this->db->prepare("INSERT INTO intership_list (business_name, adress_one, adress_two, zipcode, city, gender, manager, phone, mail, info) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $p1);
			$stmt->bindParam(2, $p2);
			$stmt->bindParam(3, $p3);
			$stmt->bindParam(4, $p4);
			$stmt->bindParam(5, $p5);
			$stmt->bindParam(6, $p6);
			$stmt->bindParam(7, $p7);
			$stmt->bindParam(8, $p8);
			$stmt->bindParam(9, $p9);
			$stmt->bindParam(10, $p10);
			$stmt->execute();
		}

		public function importUser($p1, $p2){
			$stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?,?)");
			$stmt->bindParam(1, $p1);
			$stmt->bindParam(2, $p2);
			$stmt->execute();
		}

		public function delete($id){
			$stmt = $this->db->prepare("DELETE FROM intership_list WHERE id =?");
			$stmt->bindParam(1, $id);
			$stmt->execute();
		}

		public function deleteUser($id){
			$stmt = $this->db->prepare("DELETE FROM users WHERE id =?");
			$stmt->bindParam(1, $id);
			$stmt->execute();
		}
	}
	
?>
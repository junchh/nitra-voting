<?php 
/**
 * Login Process
 * @author : Jun
 * @date   : November 2018
 */
require 'config.php';
	if(isset($_POST['strCode'])){
		$code = $_POST['strCode'];
		
		try {
			$con = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$query[0] = $con->prepare("SELECT * FROM `data_siswa` WHERE `Kode` = ?");
			$query[0]->execute([$code]);
			
			if($query[0]->rowCount() != 1){
				echo 'false';
			} else {
				$res = $query[0]->fetch(PDO::FETCH_ASSOC);
				if($res['Voted'] == 1){
					echo 'voted';
				} else {
					if($res['loggedin'] == 1){
						echo 'loggedin';
					} else {
						$query[1] = $con->prepare("UPDATE `data_siswa` SET `loggedin` = '1' WHERE `id` = ?");
						$query[1]->execute([$res['id']]);
						setcookie("loggedin", true);
						setcookie("dataSiswa", json_encode($res));
						echo 'true';
					}	
				}
			}
		} catch(PDOException $e){
			echo 'false';
		}
		/*$query = $con->prepare('SELECT * FROM `data_siswa` WHERE `Kode` = ?');
		$query->bind_param('s', $code);
		if($query->num_rows != 1){
			echo 'false';
		} else {
			$data = $query->fetch_assoc();
			if($data['Voted'] == 1){
				echo 'voted';
			} else {
				setcookie("loggedin", true);
				setcookie("dataSiswa", json_encode($data));
				echo 'true';
			}
		}
		*/
	}
?>
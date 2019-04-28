<?php 
/**
 * Voting Process
 * @author : Jun
 * @date   : November 2018
 */
require 'config.php';
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		try {
		$con = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query[0] = $con->prepare('SELECT * FROM `data_pemilih` WHERE `id` = ?');
		$query[0]->execute([$id]);
		
		if($query[0]->rowCount() != 1){
			echo 'false';
		} else {
			$data = $query[0]->fetch(PDO::FETCH_ASSOC);
			$user = json_decode($_COOKIE['dataSiswa'], true);
			$num = $data['BanyakPemilih']+1;
			$pemilih = $data['Pemilih'] . ":" . $user['id'];
			$query[1] = $con->prepare('UPDATE `data_pemilih` SET `BanyakPemilih` = ?, `Pemilih` = ? WHERE `id` = ?');
			$query[1]->execute([$num, $pemilih, $data['id']]);
			$query[2] = $con->prepare("UPDATE `data_siswa` SET `Voted` = '1', `loggedin` = '0' WHERE `id` = ?");
			$query[2]->execute([$user['id']]);
			setcookie("loggedin" , null, time()-3600);
			setcookie("dataSiswa", null, time()-3600);
			echo 'true';
		}
		
		} catch (PDOException $e){
			echo 'false';
		}
	}
?>
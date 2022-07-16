<?php 
	include("config.php");
	$idnya = $_GET['id'];
	$sql = "DELETE FROM t_anggota WHERE id_t_anggota = $idnya ";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	header("location:anggota.php");

?>
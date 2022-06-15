<?php
session_start();
if(empty($_SESSION['login'])){
	echo $_SESSION['login'];
	header("Location: ../index.php");
}
$host = 'localhost';
$dbname = 'db_pesona';
$user ='root';
$pass= '';
$mysqli = mysqli_connect($host,$user,$pass,$dbname);
if(!$mysqli){
	die("Koneksi Gagal". mysqli_connect_error());
}
?>
<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM tb_komersil1 WHERE id=$id");
    header("Location: komersil.php");
?>
<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM admin WHERE id=$id");
    header("Location: data_admin.php");
?>
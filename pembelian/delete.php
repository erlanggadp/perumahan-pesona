<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM pembelian WHERE id=$id");
    header("Location: data_pembelian.php");
?>
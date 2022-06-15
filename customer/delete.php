<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM tb_customer WHERE id=$id");
    header("Location: data_customer.php");
?>
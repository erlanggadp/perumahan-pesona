<?php
include '../auth/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT pembelian.id, tb_komersil1.id as komersilid, tb_komersil1.type, tb_komersil1.total_bayar,
tb_customer.id as customerid, tb_customer.Nama,tb_customer.Alamat FROM pembelian 
join tb_komersil1 
on tb_komersil1.id = pembelian.tb_komersil
JOIN tb_customer on tb_customer.id = pembelian.tb_customer_id WHERE pembelian.id=$id");
$cutomer = mysqli_query($mysqli, "SELECT * FROM tb_customer");
$komersil = mysqli_query($mysqli, "SELECT * FROM tb_komersil1");
while ($pembelian_data = mysqli_fetch_array($result)) {
    $komersilid = $pembelian_data['komersilid'];
    $type = $pembelian_data['type'];
    $total_bayar = $pembelian_data['total_bayar'];
    $customerid = $pembelian_data['customerid'];
    $cutomernama = $pembelian_data['Nama'];
}

if (isset($_POST['save'])) {
    $Customer = $_POST['Customer'];
    $Komersil = $_POST['Komersil'];
    $query = "UPDATE pembelian SET tb_customer_id='$Customer', tb_komersil='$Komersil' WHERE id=$id";
    if (mysqli_query($mysqli, $query)) {
        header("Location: data_pembelian.php");
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal Mengubah</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<html lang="en">

<head>
<link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
	<title>PESONA KAHURIPAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <section class="ftco-section">
        <!-- <div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Menu Pesona Kahuripan :</h2>
				</div>
			</div>
		</div> -->
        <div class="container">
            <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a class="navbar-brand" href="../pembelian/data_pembelian.php">Pesona Kahuripan</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span> Menu
                    </button>
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto mr-md-3">
                            <li class="nav-item active"><a href="../pembelian/data_pembelian.php" class="nav-link">Pembelian</a></li>
                            <li class="nav-item"><a href="../customer/data_customer.php" class="nav-link">Data Customer</a></li>
                            <li class="nav-item"><a href="../komersil/komersil.php" class="nav-link">Products</a></li>
                            <li class="nav-item"><a href="../admin/data_admin.php" class="nav-link">Data Admin</a></li>
                            <li class="dropdown nav-item d-md-flex align-items-center">
                                <a href="../auth/logout.php" class="dropdown-toggle nav-link d-flex align-items-center justify-content-center icon-cart p-0" id="dropdown04">
                                    <i class="fa fa-sign-out"></i>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <h6 style="margin: 2% 0%  ;"> Edit Pembelian :</h6>

                <form class="row g-3" method="post">
                    <div class="col-3">
                        <label for="Customer" class="form-label">Customer : </label>
                        <select class="form-select" aria-label="Default select example" name="Customer">
                            <option hidden value="<?php echo $customerid; ?>"><?php echo $cutomernama; ?></option>
                            <?php
                            while ($option = mysqli_fetch_array($cutomer)) {
                            ?> <option value="<?php echo $option['id']; ?>"><?php echo $option['Nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="Komersil" class="form-label">Product : </label>
                        <select class="form-select" aria-label="Default select example" name="Komersil">
                            <option hidden value="<?php echo $komersilid; ?>"><?php echo $type; ?></option>
                            <?php
                            while ($option = mysqli_fetch_array($komersil)) {
                            ?> <option value="<?php echo $option['id']; ?>"><?php echo $option['type']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 m-2">
                        <input type="submit" class="btn btn-dark m-1" name="save" value="Update">
                    </div>
                </form>
            </div>

    </section>
</body>

</html>
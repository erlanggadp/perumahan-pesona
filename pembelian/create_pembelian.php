<?php
include '../auth/koneksi.php';
$cutomer = mysqli_query($mysqli, "SELECT * FROM tb_customer");
$komersil = mysqli_query($mysqli, "SELECT * FROM tb_komersil1");


if (isset($_POST['save'])) {
    $Customer = $_POST['Customer'];
    $Komersil = $_POST['Komersil'];
    $query = "INSERT INTO pembelian (tb_customer_id,tb_komersil) VALUES('$Customer', '$Komersil')";
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
                <h6 style="margin: 2% 0%  ;"> Tambah Pembelian :</h6>

                <form class="row g-3" method="post">
                    <div class="col-3">
                        <label for="Customer" class="form-label">Customer : </label>
                        <select class="form-select" aria-label="Default select example" name="Customer">
                            <option hidden value="1">Select Customer</option>
                            <?php
                            while ($option = mysqli_fetch_array($cutomer)) {
                            ?> <option value="<?php echo $option['id']; ?>"><?php echo $option['Nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="Komersil" class="form-label">Product : </label>
                        <select class="form-select" aria-label="Default select example" name="Komersil">
                        <option hidden value="1">Select Product</option>
                            <?php
                            while ($option = mysqli_fetch_array($komersil)) {
                            ?> <option value="<?php echo $option['id']; ?>"><?php echo $option['type']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 m-2">
                        <input type="submit" class="btn btn-dark m-1" name="save" value="Tambah">
                    </div>
                </form>
            </div>

    </section>
</body>

</html>
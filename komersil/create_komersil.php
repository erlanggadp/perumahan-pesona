<?php
include '../auth/koneksi.php';

if (isset($_POST['save'])) {
    $type = $_POST['Type'];
    $type2 = $_POST['Type2'];
    $harga = $_POST['Harga'];
    $surat = $_POST['Surat'];
    $total = $harga+$surat;
    $query = "INSERT INTO tb_komersil1 (type,harga,biaya_surat,total_bayar) VALUES('$type/$type2', '$harga', '$surat', '$total')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: komersil.php");
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal Tambah</div>";
    }
}
?>

<!doctype html>
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
							<li class="nav-item "><a href="../pembelian/data_pembelian.php" class="nav-link">Pembelian</a></li>
							<li class="nav-item"><a href="../customer/data_customer.php" class="nav-link">Data Customer</a></li>
							<li class="nav-item active"><a href="../komersil/komersil.php" class="nav-link">Products</a></li>
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
            <!-- END nav -->
            <div class="container-fluid">
                <h6 style="margin-top: 5% ;"> Tambah Product :</h6>
                <form class="row g-3" method="post">
                        <div class="input-group mb-3 col-12">
                            <label for="Type" class="form-label" style="margin-right: 1%;">Type :</label>
                            <input type="int" class="form-control col-1" id="Type" name="Type" value="">
                            <span class="input-group-text">/</span>
                            <input type="int" class="form-control col-1" id="Type2" name="Type2">
                        </div>


                    <div class="input-group mb-3 col-12 mt-3">
                        <label for="Harga" class="form-label" style="margin-right: 1%;">Harga :</label>
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control col-2" id="Harga" name="Harga" value="">
                        <span class="input-group-text">.00</span>
                    </div>

                    <div class="input-group mb-3 col-12 ">
                        <label for="Surat" class="form-label" style="margin-right: 1%;">Biaya Surat :</label>
                        <span class="input-group-text">Rp.</span>
                        <input type="int" class="form-control col-2" id="Surat" name="Surat" value="">
                        <span class="input-group-text">.00</span>
                    </div>

                    
                    <div class="col-12 m-2">
                        <input type="submit" class="btn btn-dark m-1" name="save" value="Create">
                    </div>
                </form>
            </div>

    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
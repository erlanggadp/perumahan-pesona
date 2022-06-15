<?php
include '../auth/koneksi.php';
$query = mysqli_query($mysqli, "SELECT pembelian.id, tb_komersil1.id as komersilid, tb_komersil1.type, tb_komersil1.total_bayar,
tb_customer.id as customerid, tb_customer.Nama,tb_customer.Alamat FROM pembelian join tb_komersil1 
on tb_komersil1.id = pembelian.tb_komersil
JOIN tb_customer 
on tb_customer.id = pembelian.tb_customer_id ;");
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
			<!-- END nav -->
			<div class="container-fluid">
				<h6 style="margin-top: 5% ;"> Data Komersil :</h6>
				<a href="create_pembelian.php">
					<button type="button" class="btn btn-primary">Tambah</button></a>
				<table style="margin-top: 1%;" class="table table-bordered ">
					<table class="table table-bordered ">
						<thead class="bg-info">
							<tr>
								<th>no</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Type</th>
								<th>Total Bayar</th>
								<th class="w-25">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							while ($result = mysqli_fetch_array($query)) {
								$no++;
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $result['Nama']; ?></td>
									<td><?php echo $result['Alamat']; ?></td>
									<td><?php echo $result['type']; ?></td>
									<td><?php echo $result['total_bayar']; ?></td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic mixed styles example">
											<a href="edit_pembelian.php?id=<?php echo $result['id'] ?>">
												<button type="button" class="btn btn-warning">Edit</button>
											</a>
											<div class="btn-group" role="group" aria-label="Basic mixed styles example">
												<a href="delete.php?id=<?php echo $result['id'] ?>">
													<button type="button" class="btn btn-danger">Delete</button>
												</a>
											</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
			</div>

	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
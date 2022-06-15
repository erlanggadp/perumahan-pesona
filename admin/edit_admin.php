<?php
include '../auth/koneksi.php';

// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM admin WHERE id=$id");

while ($admin_data = mysqli_fetch_array($result)) {
    $fullname = $admin_data['full_name'];
    $username = $admin_data['username'];
    $email = $admin_data['email'];
}


if (isset($_POST['save'])) {
        $fullname = $_POST['FullName'];
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $query = "UPDATE admin SET full_name='$fullname', username='$username', email='$email' WHERE id=$id";
        if (mysqli_query($mysqli, $query)) {
            header("Location: data_admin.php");
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
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
							<li class="nav-item "><a href="../customer/data_customer.php" class="nav-link">Data Customer</a></li>
							<li class="nav-item "><a href="../komersil/komersil.php" class="nav-link">Products</a></li>
							<li class="nav-item active"><a href="../admin/data_admin.php" class="nav-link">Data Admin</a></li>
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
                <h6 style="margin-top: 5% ;"> Edit Admin : <?php echo $fullname ?> </h6>
                <form class="row g-3" method="post">
                    <div class="col-md-12">
                        <label for="FullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="FullName" name="FullName" value="<?php echo $fullname ?>">
                    </div>

                    <div class="col-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $username ?>">
                    </div>
                    <div class="col-12">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $email ?>">
                    </div>
                    <div class="col-12 m-2">
                        <input type="submit" class="btn btn-dark m-1" name="save" value="Update">
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
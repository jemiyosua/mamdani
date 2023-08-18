<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Logis Bootstrap Template - Index</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  	<main id="main">

		<div class="container">

		<div style="padding-top:30px"></div>

<?php

if (isset($_POST["submit"]) || isset($_POST["submit2"])) {

?>

			<a href="index.php" type="button" class="btn btn-danger" name="submit">Reset</a>	

			<div style="padding-bottom:30px"></div>

<?php

} else {

?>

			<form method="POST" action="index.php">
				<div class="mb-3">
					<label for="exampleFormControlInput1" 	class="form-label">Jumlah Pencucian</label>
					<input type="number" class="form-control" placeholder="Input Jumlah Pencucian" name="jumlah_pencucian">
				</div>

				<button type="submit" class="btn btn-success" name="submit">Submit</button>
			</form>

			

<?php

}

$jumlah_pencucian = 0;
if (isset($_POST["submit"])) {
	$jumlah_pencucian = $_POST["jumlah_pencucian"];
}

if ($jumlah_pencucian < 1) {
	exit;
}

?>

			<form method="POST" action="index2.php">

<?php

for ($i=1; $i <= $jumlah_pencucian; $i++) {

?>
    
				<div class="mb-3" style="width:50%">
					<label class="form-label">Ketebalan Kain Pencucian <?= $i ?></label>
					<input type="number" class="form-control" name="ketebalan_kain_<?=$i?>">
				</div>

				<div class="mb-3" style="width:50%">
					<label class="form-label">Tingkat Kekotoran <?= $i ?></label>
					<input type="number" class="form-control" name="tingkat_kekotoran_<?=$i?>">
				</div>

				<div class="mb-3" style="width:50%">
					<label class="form-label">Warna Kain <?= $i ?></label>
					<input type="number" class="form-control" name="warna_kain_<?=$i?>">
				</div>

				<div class="mb-3" style="width:50%">
					<label class="form-label">Bobot Cucian <?= $i ?></label>
					<input type="number" class="form-control" name="bobot_cucian_<?=$i?>">
				</div>

<?php

}

?>

				<input type="hidden" class="form-control" name="jumlah_pencucian" value="<?=$jumlah_pencucian?>">

				<button type="submit" class="btn btn-success" name="submit">Submit</button>

			</form>

		</div>

	</main><!-- End #main -->

	<!-- Vendor JS Files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>

</body>

</html>
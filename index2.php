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

if (isset($_POST["submit"])) {

	
    $takaran = array();
    function FungsiInferensiSedikit($variabel_kain, $variabel_kekotoran, $variabel_warna, $variabel_bobot) {
        global $takaran;
        if ($variabel_kain != 0) {
            if ($variabel_kekotoran != 0) {
                if ($variabel_warna != 0) {
                    if ($variabel_bobot != 0) {
                        $hasil_output = min($variabel_kain, $variabel_kekotoran, $variabel_warna, $variabel_bobot);
                        array_push($takaran, [$hasil_output, 40]);
                    }
                }
            }
        }
    }

    function FungsiInferensiBanyak($variabel_kain, $variabel_kekotoran, $variabel_warna, $variabel_bobot) {
        global $takaran;
        if ($variabel_kain != 0) {
            if ($variabel_kekotoran != 0) {
                if ($variabel_warna != 0) {
                    if ($variabel_bobot != 0) {
                        $hasil_output = min($variabel_kain, $variabel_kekotoran, $variabel_warna, $variabel_bobot);
                        array_push($takaran, [$hasil_output, 80]);
                    }
                }
            }
        }
    }

	function linspace($start, $end, $numPoints) {
		$step = ($end - $start) / max($numPoints - 1, 1);
		$result = array();
	
		for ($i = 0; $i < $numPoints; $i++) {
			$result[] = $start + ($step * $i);
		}
	
		return $result;
	}

	function zeros_like($inputArray) {
		$shape = array_map('count', $inputArray);
		$outputArray = [];
	
		foreach ($shape as $dimSize) {
			$dimZeros = array_fill(0, $dimSize, 0);
			$outputArray[] = $dimZeros;
		}
	
		return $outputArray;
	}

	function numpy_sum($array, $axis = null) {
		if ($axis === null) {
			return array_sum($array);
		}
	
		if ($axis === 0) {
			$result = array_fill(0, count($array[0]), 0);
			foreach ($array as $row) {
				for ($i = 0; $i < count($row); $i++) {
					$result[$i] += $row[$i];
				}
			}
			return $result;
		}
	
		if ($axis === 1) {
			$result = [];
			foreach ($array as $row) {
				$result[] = array_sum($row);
			}
			return $result;
		}
	
		return null;
	}

	function elementwise_multiply($array1, $array2) {
		if (count($array1) !== count($array2)) {
			return null; // Arrays must have the same size for element-wise multiplication
		}
	
		$result = [];
		for ($i = 0; $i < count($array1); $i++) {
			$result[] = $array1[$i] * $array2[$i];
		}
		
		return $result;
	}

    for ($j=1; $j <= $_POST["jumlah_pencucian"]; $j++) {
        $kain = $_POST["ketebalan_kain_$j"];
		$kekotoran = $_POST["tingkat_kekotoran_$j"];
		$warna = $_POST["warna_kain_$j"];
		$bobot = $_POST["bobot_cucian_$j"];

		// ------ start of ketebalan -------
		if ($kain <= 3) {
			$value_tipis = 1;
			$value_sedang = 0;
			$value_tebal = 0;
		}
		if ($kain > 3 && $kain < 5) {
			$value_tipis = (5-$kain)/(5-3);
			$value_sedang = ($kain - 3)/(5-3);
			$value_tebal = 0;
		}
		if ($kain == 5) {
			$value_tipis = 0;
			$value_sedang = 1;
			$value_tebal = 0;
		}
		if ($kain > 5 && $kain < 0) {
			$value_tipis = 0;
			$value_sedang = (8 - $kain)/(8-5);
			$value_tebal = ($kain - 5)/(8-5);
		}
		if ($kain >= 8) {
			$value_tipis = 0;
			$value_sedang = 0;
			$value_tebal = 1;
		}
		// ------ end of ketebalan -------
		
		// ------ start of kekotoran -------
		if ($kekotoran <= 3) {
			$value_rendah = 1;
			$value_tinggi = 0;
		}
		if ($kekotoran > 3 && $kekotoran < 8) {
			$value_rendah = (8 - $kekotoran)/(8 - 3);
			$value_tinggi = ($kekotoran - 3)/(8 - 3);
		}
		if ($kekotoran >= 8) {
			$value_rendah = 0;
			$value_tinggi = 1;
		}
		// ------ end of kekotoran -------

		// ------ start of warna -------
		if ($warna <= 3) {
			$value_gelap = 1;
			$value_sedang = 0;
			$value_terang = 0;
		}
		if ($warna > 3 && $warna < 5) {
			$value_gelap = (5 - $warna)/(5 - 3);
			$value_sedang = ($warna - 3)/(5 - 3);
			$value_terang = 0;
		}  
		if ($warna == 5) {
			$value_gelap = 0;
			$value_sedang = 1;
			$value_terang = 0;
		}   
		if ($warna > 5 && $warna < 8) {
			$value_gelap = 0;
			$value_sedang = (8 - $warna)/(8 - 5);
			$value_terang = ($warna - 5)/(8 - 5);
		}  
		if ($warna >= 8) {
			$value_gelap = 0;
			$value_sedang = 0;
			$value_terang = 1;
		}
		// ------ end of warna -------

		// ------ start of berat -------
		if ($bobot <= 3) {
			$value_ringan = 1;
			$value_berat = 0;
		}
		if ($bobot > 3 && $bobot < 8) {
			$value_ringan = (8 - $bobot)/(8 - 3);
			$value_berat = ($bobot - 3)/(8 - 3);
		}   
		if ($bobot >= 8) {
			$value_ringan = 0;
			$value_berat = 1;
		}
		// ------ end of berat -------

		// RulesSedikit
		// 1-6
		FungsiInferensiSedikit($value_tipis, $value_rendah, $value_terang, $value_ringan);
		FungsiInferensiSedikit($value_tipis, $value_rendah, $value_terang, $value_berat);
		FungsiInferensiSedikit($value_tipis, $value_rendah, $value_sedang, $value_ringan);
		FungsiInferensiSedikit($value_tipis, $value_rendah, $value_sedang, $value_berat);
		FungsiInferensiSedikit($value_tipis, $value_rendah, $value_gelap, $value_ringan);
		FungsiInferensiSedikit($value_tipis, $value_rendah, $value_gelap, $value_berat);

		// 13-18
		FungsiInferensiSedikit($value_sedang, $value_rendah, $value_terang, $value_ringan);
		FungsiInferensiSedikit($value_sedang, $value_rendah, $value_terang, $value_berat);
		FungsiInferensiSedikit($value_sedang, $value_rendah, $value_sedang, $value_ringan);
		FungsiInferensiSedikit($value_sedang, $value_rendah, $value_sedang, $value_berat);
		FungsiInferensiSedikit($value_sedang, $value_rendah, $value_gelap, $value_ringan);
		FungsiInferensiSedikit($value_sedang, $value_rendah, $value_gelap, $value_berat);
		// 25-30
		FungsiInferensiSedikit($value_tebal, $value_rendah, $value_terang, $value_ringan);
		FungsiInferensiSedikit($value_tebal, $value_rendah, $value_terang, $value_berat);
		FungsiInferensiSedikit($value_tebal, $value_rendah, $value_sedang, $value_ringan);
		FungsiInferensiSedikit($value_tebal, $value_rendah, $value_sedang, $value_berat);
		FungsiInferensiSedikit($value_tebal, $value_rendah, $value_gelap, $value_ringan);
		FungsiInferensiSedikit($value_tebal, $value_rendah, $value_gelap, $value_berat);

		// RulesBanyak
		// 7-12
		FungsiInferensiBanyak($value_tipis, $value_tinggi, $value_terang, $value_ringan);
		FungsiInferensiBanyak($value_tipis, $value_tinggi, $value_terang, $value_berat);
		FungsiInferensiBanyak($value_tipis, $value_tinggi, $value_sedang, $value_ringan);
		FungsiInferensiBanyak($value_tipis, $value_tinggi, $value_sedang, $value_berat);
		FungsiInferensiBanyak($value_tipis, $value_tinggi, $value_gelap, $value_ringan);
		FungsiInferensiBanyak($value_tipis, $value_tinggi, $value_gelap, $value_berat);
		// 19-24
		FungsiInferensiBanyak($value_sedang, $value_tinggi, $value_terang, $value_ringan);
		FungsiInferensiBanyak($value_sedang, $value_tinggi, $value_terang, $value_berat);
		FungsiInferensiBanyak($value_sedang, $value_tinggi, $value_sedang, $value_ringan);
		FungsiInferensiBanyak($value_sedang, $value_tinggi, $value_sedang, $value_berat);
		FungsiInferensiBanyak($value_sedang, $value_tinggi, $value_gelap, $value_ringan);
		FungsiInferensiBanyak($value_sedang, $value_tinggi, $value_gelap, $value_berat);
		// 31-36
		FungsiInferensiBanyak($value_tebal, $value_tinggi, $value_terang, $value_ringan);
		FungsiInferensiBanyak($value_tebal, $value_tinggi, $value_terang, $value_berat);
		FungsiInferensiBanyak($value_tebal, $value_tinggi, $value_sedang, $value_ringan);
		FungsiInferensiBanyak($value_tebal, $value_tinggi, $value_sedang, $value_berat);
		FungsiInferensiBanyak($value_tebal, $value_tinggi, $value_gelap, $value_ringan);
		FungsiInferensiBanyak($value_tebal, $value_tinggi, $value_gelap, $value_berat);

		$num_points = 1000;
		$step_size = 100 / ($num_points - 1);
		$x = linspace(0, 100, $num_points);
		$y = zeros_like($x);

		for ($k=0; $k < count($takaran); $k++) { 
			$start = $takaran[$k][1] - 10; // batas bawah himpunan fuzzy
			$end = $takaran[$k][1] + 10; // batas atas himpunan fuzzy
			
			// menghitung derajat keanggotaan segitiga
			for ($l=0; $l < $num_points; $l++) {
				if ($x[$l] <= $start) {
					$y[$l] = 0;
				} else if ($x[$l] > $start && $x[$l] <= $takaran[$k][1]) {
					$y[$l] = ($x[$l] - $start) / ($takaran[$k][1] - $start);
				} else if ($x[$l] > $takaran[$k][1] && $x[$l] < $end) {
					$y[$l] = ($end - $x[$l]) / ($end - $takaran[$k][1]);
				} else {
					$y[$l] = 0;
				}
				
			}


			$multiply_sum = elementwise_multiply($x, $y); 
			$defuzz_result = numpy_sum($multiply_sum) / numpy_sum($y);
			$rounded_result = round($defuzz_result / 40) * 40;
		}

        ?>

        <table class="table table-hover" style="text-align:center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ketebalan Kain Pencucian - <?= $j ?></th>
                    <th scope="col">Tingkat Kekotoran - <?= $j ?></th>
                    <th scope="col">Warna Kain - <?= $j ?></th>
                    <th scope="col">Bobot Cucian - <?= $j ?></th>
                    <th scope="col">Takaran Deterjen Ke - <?= $j ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $kain ?></td>
                    <td><?= $kekotoran ?></td>
                    <td><?= $warna ?></td>
                    <td><?= $bobot ?></td>
                    <td><?= $rounded_result ?></td>
                </tr>
            </tbody>
        </table>

    <?php

    }
}

// 2221084090

?>

        </div>
    </main>
</body>


<?php

for ($i=0; $i < 2; $i++) { 

    $a_kain = 5;
    $b_kekotoran = 5;
    $c_warna = 5;
    $d_bobot = 5;

    $kain = $a_kain;
    $kekotoran = $b_kekotoran;
    $warna = $c_warna;
    $bobot = $d_bobot;

    if ($kain <= 3) {
        $value_tipis = 1;
        $value_sedang = 0;
        $value_tebal = 0;
    }
    if ($kian > 3 && $kain < 5) {
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

    echo "Maka ketebalan kain dalam variabel linguistik, derajat keanggotaan adalah : <br>";
    echo "Tipis " . $value_tipis . "<br>";
    echo "Sedang " . $value_sedang . "<br>";
    echo "Tebal " . $value_tebal . "<br>";

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

    echo "Maka tingkat kekotoran dalam variabel linguistik, derajat keanggotaan adalah : <br>";
    echo "Rendah " . $value_rendah . "<br>";
    echo "Tinggi " . $value_tinggi . "<br>";

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

    echo "Maka warna kain dalam variabel linguistik, derajat keanggotaan adalah : <br>";
    echo "Gelap " . $value_gelap . "<br>";
    echo "Samar " . $value_sedang . "<br>";
    echo "Terang " . $value_terang . "<br>";

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

    echo "Maka bobot cucian dalam variabel linguistik, derajat keanggotaan adalah : <br>";
    echo "Ringan " . $value_ringan . "<br>";
    echo "berat " . $value_berat . "<br>";

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

    for ($i=0; $i < count($takaran); $i++) { 
        $perkalian = $takaran[$i][0]*$takaran[$i][1];
        $pembagian = $takaran[$i][0];
        $perkalian_new += $perkalian;
        $pembagian_new += $pembagian;
        $z = $perkalian_new / $pembagian_new;
    }
}

echo "Takaran Deterjen adalah (z) : " . $z . " [ml]";
<?php
include 'koneksi.php';

if (
    !empty($_POST['id']) &&
    !empty($_POST['nikAnak']) &&
    !empty($_POST['namaAnak']) &&
    !empty($_POST['tanggalUkur']) &&
    !empty($_POST['waktuUkur']) &&
    !empty($_POST['berat']) &&
    !empty($_POST['tinggi']) &&
    !empty($_POST['caraUkur'])
) {
    $id         = $_POST['id'];
    $nikAnak    = $_POST['nikAnak'];
    $namaAnak   = $_POST['namaAnak'];
    $tanggal    = $_POST['tanggalUkur'];
    $waktu      = $_POST['waktuUkur'];
    $berat      = $_POST['berat'];
    $tinggi     = $_POST['tinggi'];
    $caraUkur   = $_POST['caraUkur'];

    $sql = "INSERT INTO data_balita (id, nikAnak, namaAnak, tanggalUkur, waktuUkur, berat, tinggi, caraUkur)
            VALUES ('$id', '$nikAnak', '$namaAnak', '$tanggalUkur', '$waktuUkur', '$berat', '$tinggi', '$caraUkur')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap";
}

$koneksi->close();

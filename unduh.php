<?php
include "koneksi.php";

date_default_timezone_set("Asia/Jakarta");
$now = date("d-m-Y H.i.s");

header('Content-Type: text/csv');
header("Content-Disposition: attachment;filename=\"data Export $now.csv\"");

$output = fopen("php://output", "w");

fputcsv($output, [
    'No',
    'NIK',
    'nama_anak',
    'TANGGALUKUR',
    'BERAT',
    'TINGGI',
    'LILA',
    'lingkar_kepala',
    'CARAUKUR',
    'vita',
    'asi_bulan_1',
    'asi_bulan_2',
    'asi_bulan_3',
    'asi_bulan_4',
    'asi_bulan_5',
    'asi_bulan_6',
    'pemberian_ke',
    'sumber_pmt',
    'pemberian_pusat',
    'tahun_produksi',
    'pemberian_daerah'
]);

$data = $koneksi->query("SELECT * FROM data_balita");

$no = 1;
while ($row = $data->fetch_assoc()) {
    fputcsv($output, [
        $no++,
        $row['nikAnak'] ?? '',
        $row['namaAnak'] ?? '',
        $row['tanggalUkur'] ?? '',
        $row['berat'] ?? '',
        $row['tinggi'] ?? '',
        $row['lila'] ?? '',
        $row['lingkar_kepala'] ?? '',
        $row['caraUkur'] ?? '',
        $row['vita'] ?? '',
        $row['asi_bulan_1'] ?? '',
        $row['asi_bulan_2'] ?? '',
        $row['asi_bulan_3'] ?? '',
        $row['asi_bulan_4'] ?? '',
        $row['asi_bulan_5'] ?? '',
        $row['asi_bulan_6'] ?? '',
        $row['pemberian_ke'] ?? '',
        $row['sumber_pmt'] ?? '',
        $row['pemberian_pusat'] ?? '',
        $row['tahun_produksi'] ?? '',
        $row['pemberian_daerah'] ?? ''
    ]);
}

fclose($output);
?>

<script>
    setTimeout(() => {
        window.location.href = 'data.php?unduh=1';
    }, 1000);
</script>
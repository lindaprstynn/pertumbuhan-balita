<?php
include "koneksi.php";

$sql_last = "SELECT * FROM data_balita ORDER BY waktuUkur DESC LIMIT 1";
$result_last = mysqli_query($koneksi, $sql_last);
$data_terbaru = mysqli_fetch_assoc($result_last);

$sql = "SELECT * FROM data_balita ORDER BY waktuUkur DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pemantauan Pertumbuhan Balita</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">Pemantauan Pertumbuhan Balita</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <p>
        <div class="row gx-5">
            <div class="col">
                <div class="row">
                    <div class="p-2 border bg-success text-white">
                        <p><span id="nikAnak">NIK : <?php echo $data_terbaru['nikAnak']; ?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="p-2 border bg-success text-white">
                        <p><span id="namaAnak">Nama : <?php echo $data_terbaru['namaAnak']; ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col">

                <div class="p-3 border bg-success text-white">
                    <p>Berat</p>
                    <center>
                        <h3>
                            <span id="berat"><?php echo $data_terbaru['berat']; ?></span> Kg
                        </h3>
                    </center>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-success text-white">
                    <p>Tinggi</p>
                    <center>
                        <h3>
                            <span id="tinggi"><?php echo $data_terbaru['tinggi']; ?></span> Cm
                        </h3>
                    </center>
                </div>
            </div>
        </div>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <?php if (isset($_GET['unduh']) && $_GET['unduh'] == 1): ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                Pengunduhan Berhasil!
            </div>
        </div>
    <?php endif; ?>
    <table class="table table-hover">
        <thead class="table-success">
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Waktu Ukur</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Anak</th>
                <th scope="col">Tanggal Ukur</th>
                <th scope="col">Berat</th>
                <th scope="col">Tinggi</th>
                <th scope="col">Cara Ukur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr align="center">
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $row['waktuUkur'] ?></td>
                    <td><?php echo $row['nikAnak'] ?></td>
                    <td><?php echo $row['namaAnak'] ?></td>
                    <td><?php echo $row['tanggalUkur'] ?></td>
                    <td><?php echo $row['berat'] ?></td>
                    <td><?php echo $row['tinggi'] ?></td>
                    <td><?php echo $row['caraUkur'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="unduh.php" class="btn btn-success text-white">Download</a>
    </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
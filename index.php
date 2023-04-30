<?php
    session_start();
    require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" />
    <style>
        * {
            scroll-behavior: smooth;
        }
    </style>

    <title>CRUD Data Pegawai</title>
</head>
<body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pegawai
                            <a href="create.php" class="btn btn-primary float-end">Tambah Data</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>ID Jabatan</th>
                                    <th>Gaji</th>
                                    <th>ID Departemen</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // query untuk menampilkan isi tabel
                                    $query = "SELECT * FROM pegawai";
                                    $query_run = mysqli_query($con, $query);
                                    // jika query berhasilkan dijalankan dan tabel ada isinya, maka akan ditampilkan
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $pegawai)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $pegawai['id_pegawai']; ?></td>
                                                <td><?= $pegawai['nama_pegawai']; ?></td>
                                                <td><?= $pegawai['email']; ?></td>
                                                <td><?= $pegawai['no_hp']; ?></td>
                                                <td><?= $pegawai['id_jabatan']; ?></td>
                                                <td><?= $pegawai['gaji']; ?></td>
                                                <td><?= $pegawai['id_departemen']; ?></td>
                                                <td>
                                                    <a href="view.php?id=<?= $pegawai['id_pegawai']; ?>" class="btn btn-success btn-sm">Lihat</a>
                                                    <a href="edit.php?id=<?= $pegawai['id_pegawai']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_employee" value="<?=$pegawai['id_pegawai'];?>" 
                                                        class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    // jika terjadi kesalahan dalam eksekusi query, akan muncul pesan berikut
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tombol ke bagian atas halaman -->
    <div class="fixed-bottom d-flex justify-content-end mr-3 mb-3">
        <a href="#" id="gotop" class="btn btn-primary rounded-circle shadow-sm">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="">
        // fungsi untuk tombol ke bagian atas halaman
        const btnGoUp = document.getElementById("gotop");
        btnGoUp.addEventListener("click", function() {
        // method scrollTo untuk scroll ke atas halaman
        window.scrollTo(0, 0);
        });
    </script>

</body>
</html>
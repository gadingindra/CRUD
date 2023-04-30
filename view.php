<?php
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

    <title>Lihat Data Pegawai</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lihat Data
                            <a href="index.php" class="btn btn-danger float-end">KEMBALI</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            // akan menampilkan data pada baris dengan id tertentu yang diklik
                            if(isset($_GET['id']))
                            {
                                $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT p.nama_pegawai, p.email, p.no_hp, p.id_jabatan, 
                                j.jabatan, p.gaji, p.id_departemen, d.nama_departemen FROM pegawai p 
                                JOIN jabatan j ON p.id_jabatan = j.id_jabatan
                                JOIN departemen d ON p.id_departemen = d.id_departemen
                                WHERE id_pegawai='$employee_id' ";
                                $query_run = mysqli_query($con, $query);
                                

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $pegawai = mysqli_fetch_array($query_run);
                        ?>
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <p class="form-control">
                                            <?=$pegawai['nama_pegawai'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$pegawai['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>No HP</label>
                                        <p class="form-control">
                                            <?=$pegawai['no_hp'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ID Jabatan</label>
                                        <p class="form-control">
                                            <?=$pegawai['id_jabatan'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jabatan</label>
                                        <p class="form-control">
                                            <?=$pegawai['jabatan'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Gaji</label>
                                        <p class="form-control">
                                            <?=$pegawai['gaji'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ID Departemen</label>
                                        <p class="form-control">
                                            <?=$pegawai['id_departemen'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Departemen</label>
                                        <p class="form-control">
                                            <?=$pegawai['nama_departemen'];?>
                                        </p>
                                    </div>
                                <?php
                                }
                                else
                                {
                                    echo "<h4>No Such Id Found</h4>";
                                }
                            }
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
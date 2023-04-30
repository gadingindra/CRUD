<?php
    session_start();
    require 'dbcon.php';

    // query untuk mengisi dropdown pada form
    $query_jabatan = "SELECT * FROM jabatan";
    $result_jabatan = mysqli_query($con, $query_jabatan);                    
    $query_departemen = "SELECT id_departemen, nama_departemen FROM departemen";                    
    $result_departemen = mysqli_query($con, $query_departemen);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Tambah Data Pegawai</title>
</head>
<body>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data
                            <a href="index.php" class="btn btn-danger float-end">KEMBALI</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>No HP</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>ID Jabatan</label>
                                <select class="form-control" name="job">
                                    <option value="">- Pilih Jabatan -</option>
                                    <?php while ($row_jabatan = mysqli_fetch_assoc($result_jabatan)) { ?>
                                        <option value="<?php echo $row_jabatan['id_jabatan']; ?>" name="job">
                                            <!-- menampilkan isi kolom berupa jabatan -->
                                            <?php echo $row_jabatan['jabatan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Gaji</label>
                                <input type="text" name="salary" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>ID Departemen</label>
                                <select class="form-control" name="department">
                                    <option value="">- Pilih Departemen -</option>
                                    <?php while ($row_departemen = mysqli_fetch_assoc($result_departemen)) { ?>
                                        <option value="<?php echo $row_departemen['id_departemen']; ?>" name="department">
                                        <!-- menampilkan isi kolom berupa nama departemen -->    
                                        <?php echo $row_departemen['nama_departemen']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_employee" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
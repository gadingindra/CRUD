<?php
    session_start();
    require 'dbcon.php';

    // fungsi untuk proses penghapusan data
    if(isset($_POST['delete_employee']))
    {
        $employee_id = mysqli_real_escape_string($con, $_POST['delete_employee']);

        $query = "DELETE FROM pegawai WHERE id_pegawai='$employee_id' ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Data berhasil dihapus.";
            header("Location: index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Data gagal dihapus.";
            header("Location: index.php");
            exit(0);
        }
    }

    // fungsi untuk proses pengubahan data
    if(isset($_POST['update_employee']))
    {
        $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $job = mysqli_real_escape_string($con, $_POST['job']);
        $salary = mysqli_real_escape_string($con, $_POST['salary']);
        $department = mysqli_real_escape_string($con, $_POST['department']);

        $query = "UPDATE pegawai SET nama_pegawai='$name', email='$email', no_hp='$phone', 
        id_jabatan='$job', gaji='$salary', id_departemen='$department' WHERE id_pegawai='$employee_id' ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Data berhasil diubah.";
            header("Location: index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Data gagal diubah.";
            header("Location: index.php");
            exit(0);
        }

    }

    // fungsi untuk proses penambahan data
    if(isset($_POST['save_employee']))
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $job = mysqli_real_escape_string($con, $_POST['job']);
        $salary = mysqli_real_escape_string($con, $_POST['salary']);
        $department = mysqli_real_escape_string($con, $_POST['department']);
        echo "$department";

        $query = "INSERT INTO pegawai (nama_pegawai, email, no_hp, id_jabatan, gaji, id_departemen) 
        VALUES ('$name','$email','$phone','$job','$salary','$department')";

        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Data berhasil ditambahkan.";
            header("Location: create.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Data gagal ditambahkan.";
            header("Location: create.php");
            exit(0);
        }
    }

?>
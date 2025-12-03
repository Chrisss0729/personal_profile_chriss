<?php
include '../../app.php';

if(isset($_POST['tombol'])){
    $date = $_POST['date'];
    $job = $_POST['job'];
    $place = $_POST['place'];
    $description = $_POST['description'];

    $qInsert = "INSERT INTO resumes (date, job, place, description) 
               VALUES ('$date', '$job', '$place', '$description')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/resume/index.php';
        </script>
        ";
    
    } else {
        echo "<script>
        alert('Data gagal ditambah');
        window.location.href = '../../pages/resume/create.php';
        </script>
        ";
    }
?>
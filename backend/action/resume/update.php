<?php
include '../../app.php';
include './show.php';

if(isset($_POST['tombol'])){
    $date = escapeString(text: $_POST['date']);
    $job = escapeString(text :$_POST['job']);
    $place = escapeString(text: $_POST['place']);
    $description = escapeString(text: $_POST['description']);

   $qUpdate = "UPDATE resumes SET date = '$date', job = '$job', place = '$place', description = '$description' WHERE id = '$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
        if ($result) {
           echo "
           <script>
            alert('Data Berhasil di Ubah');
            window.location.href='../../pages/resume/index.php'; 
            </script>";
        
        } else {
            echo "
            <script>
            alert('Data Gagal di Ubah');
            window.location.href='../../pages/resume/edit.php'; 
            </script>";   
    }
}

?>
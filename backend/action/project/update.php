<?php
include '../../app.php';
include './show.php'; // ambil $project lama berdasarkan id

if (isset($_POST['tombol'])) {
    // Ambil data dari form
    $id          = $_POST['id'];
    $title       = $_POST['title'];
    $job         = $_POST['job'];
    $category    = $_POST['category'];
    $description = $_POST['description'];

    // Path folder penyimpanan gambar
    $storages = "../../../storages/project/";

    // Default pakai gambar lama
    $imageNew = $project->image;

    // Jika ada upload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageTmp  = $_FILES['image']['tmp_name'];
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $imageNew  = $imageName;

        // Hapus gambar lama kalau ada
        if (!empty($project->image) && file_exists($storages . $project->image)) {
            unlink($storages . $project->image);
        }

        // Pindahkan file baru ke folder penyimpanan
        move_uploaded_file($imageTmp, $storages . $imageNew);
    }

    // Update data ke database
    $qUpdate = "UPDATE projects 
                SET title = '$title', 
                    job = '$job', 
                    category = '$category', 
                    description = '$description', 
                    image = '$imageNew' 
                WHERE id = '$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    if ($result) {
        echo "
            <script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/project/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                window.location.href='../../pages/project/edit.php?id=$id';
            </script>
        ";
    }
}

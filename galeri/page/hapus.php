<?php
include 'koneksi.php'; // pastikan ini menghubungkan ke database Anda

if (isset($_GET['id'])) {
    $fotoID = $_GET['id'];
    
    // Ambil nama file foto dari database
    $query = "SELECT NamaFile FROM foto WHERE FotoID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $fotoID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $namaFile = $row['NamaFile'];

        // Hapus file dari sistem
        if (file_exists("uploads/$namaFile")) {
            unlink("uploads/$namaFile");
        }

        // Hapus data foto dari database
        $deleteQuery = "DELETE FROM foto WHERE FotoID = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $fotoID);
        if ($deleteStmt->execute()) {
            header("Location: home.php"); // Redirect ke halaman galeri setelah penghapusan
            exit;
        } else {
            echo "Gagal menghapus foto";
        }
    } else {
        echo "Foto tidak ditemukan";
    }
} else {
    echo "ID foto tidak diberikan";
}
?>

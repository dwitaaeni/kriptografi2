<?php
require_once("koneksi.php");
require_once("polyalphabet.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];
    $key = "PINTU"; // Ganti dengan kunci rahasia Anda

    // Enkripsi password menggunakan Polyalphabet Cipher
    $encryptedPassword = encryptPolyalphabet($rawPassword, $key);

    // Simpan ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$encryptedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

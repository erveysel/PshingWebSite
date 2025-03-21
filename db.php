<?php
// db.php
$host = "localhost";     // Veritabanı sunucusu
$dbname = "siberac1_ps"; // Veritabanı adı
$username = "siberac1_ps";      // Veritabanı kullanıcı adı
$password = "Fsmvu.1453";         // Veritabanı şifresi

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Hata yakalama modunu ayarlayalım (geliştirme aşaması için):
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
    exit;
}

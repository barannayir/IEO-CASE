<?php
function dummyData(){
// Veritabanı bağlantısı oluşturma
$conn = mysqli_connect('localhost', 'root', 'baran123');

// Eğer bağlantı başarısız olursa hata mesajını göster
if (!$conn) {
  die('Bağlantı hatası: ' . mysqli_connect_error());
}


$db_check = mysqli_select_db($conn, 'IEODB');

if (!$db_check) {
   





// Veritabanı oluşturma sorgusu
$sql = 'CREATE DATABASE IEODB';

// Veritabanı oluşturma sorgusunu çalıştırma
if (mysqli_query($conn, $sql)) {
  echo "Veritabanı oluşturuldu\n";
} else {
  echo 'Veritabanı oluşturma hatası: ' . mysqli_error($conn) . "\n";
}


// User tablosu oluşturma sorgusu
$sql = "CREATE TABLE IEODB.User (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Ad VARCHAR(30) NOT NULL,
  Soyad VARCHAR(30) NOT NULL,
  Eposta VARCHAR(50) NOT NULL,
  Telefon VARCHAR(30) NOT NULL,
  Parola VARCHAR(255) NOT NULL
)";

// User tablosu oluşturma sorgusunu çalıştırma
if (mysqli_query($conn, $sql)) {
  echo "User tablosu oluşturuldu\n";
} else {
  echo 'User tablosu oluşturma hatası: ' . mysqli_error($conn) . "\n";
}

// Nöbet tablosu oluşturma sorgusu
$sql = "CREATE TABLE IEODB.Nobet (
    nobet_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Firma VARCHAR(30) NOT NULL,
    NobetTarihi DATE NOT NULL,
    Adres VARCHAR(50) NOT NULL,
    Telefon VARCHAR(20) NOT NULL
)";

// Eğer tablo oluşturulursa "Tablo oluşturuldu" mesajı, oluşturulamazsa hata mesajı verir
if (mysqli_query($conn, $sql)) {
    echo "Tablo oluşturuldu<br>";
} else {
    echo "Tablo oluşturulamadı: " . mysqli_error($conn) . "<br>";
}



$names = ['Baran', 'Mehmet', 'Ali', 'Veli', 'Murat', 'Berat'];
$surnames = ['Nayır', 'Kaya', 'Çelik', 'Demir', 'Erdoğan', 'Köse'];
$emails = ['baran@gmail.com', 'mehmet@example.com', 'ali@example.com', 'veli@example.com', 'murat@example.com', 'berat@example.com'];
$phones = ['05012345678', '05098765432', '05011111111', '05022222222', '05033333333', '05044444444'];
$passwords = ['baran123', 'parola123', 'password123', 'qwerty123', 'asdfgh123', 'zxcvbn123'];

for ($i = 0; $i < 6; $i++) {
    $name = $names[$i];
    $surname = $surnames[$i];
    $email = $emails[$i];
    $phone = $phones[$i];
    $password = password_hash($passwords[$i], PASSWORD_DEFAULT);
    $query = "INSERT INTO IEODB.User (Ad, Soyad, Eposta, Telefon, Parola) VALUES ('$name', '$surname', '$email', '$phone', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "$names[$i] kaydedildi<br>";
    } else {
        echo "$names[$i] kaydedilemedi". mysqli_error($conn). "<br>";
    }
}

$firma = array("Firma A", "Firma B", "Firma C", "Firma D", "Firma E");
$nobet_tarihi = array("2022-01-01", "2022-01-02", "2022-01-03", "2022-01-04", "2022-01-05");
$adres = array("Adres 1", "Adres 2", "Adres 3", "Adres 4", "Adres 5");
$telefon = array("05011111111", "05011111111", "05011111111", "05011111111", "05011111111");

for ($i = 0; $i < 5; $i++) {
    $sql = "INSERT INTO IEODB.Nobet (Firma, NobetTarihi, Adres, Telefon)
    VALUES ('$firma[$i]', '$nobet_tarihi[$i]', '$adres[$i]', '$telefon[$i]')";
    if (mysqli_query($conn, $sql)) {
        echo "$firma[$i] kaydedildi<br>";
    } else {
        echo "$firma[$i] kaydedilemedi";
    }
}


// Veritabanı bağlantısını kapat
mysqli_close($conn);
} 
}
?>
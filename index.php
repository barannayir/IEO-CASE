<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}
// Veritabanı bağlantısı açılır.
$link = mysqli_connect("localhost", "root", "baran123", "IEODB");

// Eğer form gönderilmişse,
if (isset($_POST['submit'])) {
    // Formdan gelen nobet_id değişkenine atanır.
    $nobet_id = $_POST['nobet_id'];

    // Nöbet bilgisi çekilir.
    $url = "http://localhost/IEO-CASE/nobet.php?nobet_id=$nobet_id";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    $nobet = json_decode($data);
    // Eğer nöbet bulunursa,
    if ($nobet) {
        // Nöbet bilgileri ekrana yazdırılır.
        echo '<div class="modal" id="modal">
  <div class="modal-content">
    <h3>Nöbet Bilgisi</h3>
    <p>Firma: <span id="firma">'.$nobet->Firma.'</span></p>
    <p>Nobet Tarihi: <span id="nobet-tarihi">'.$nobet->NobetTarihi.'</span></p>
    <p>Adres: <span id="adres">'.$nobet->Adres.'</span></p>
    <p>Telefon: <span id="telefon">'.$nobet->Telefon.'</span></p>
  </div>
</div>';
    } else {
        // Nöbet bulunamazsa, hata mesajı gösterilir.
        echo '<div class="modal" id="modal">
        <div class="modal-content">
          <h3>Nöbet Bilgisi Bulunamadı</h3>
        </div>
      </div>';
    }
}

?>
<style>
    .logout-button-container {
  position: absolute;
  top: 10px;
  right: 10px;
}

.logout-button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.form-input{
    width: 30%;
    margin: 0 auto;
    text-align: center;
}
input[type=text], input[type=submit] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}
.modal {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 2px solid #666;
  border-radius: 5px;
}

</style>
<div class="logout-button-container">
  <form action="logout.php" method="post">
    <button type="submit" class="logout-button">Çıkış Yap</button>
  </form>
</div>
<form method="post" class="form-input" action="index.php">
    <input type="text" name="nobet_id" placeholder="Nöbet ID">
    <input type="submit" name="submit" value="Göster">
</form>




<?php
require_once 'dummy-data.php';
dummyData();
session_start();

// Veritabanı bağlantısı açılır.
$link = mysqli_connect("localhost", "root", "baran123", "IEODB");

// Eğer form gönderilmişse,
if (isset($_POST['submit'])) {
    // Formdan gelen mail ve parola değişkenlerine atanır.
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Veritabanından kullanıcının bilgileri çekilir.
    $query = "SELECT * FROM user WHERE Eposta='$email'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }
    if (password_verify($password, $user['Parola'])) {
        // Oturum açılır ve kullanıcı index.php sayfasına yönlendirilir.
        $_SESSION['email'] = $email;
        header("Location: index.php");
    } else {
        // Kullanıcı bilgileri yanlışsa, hata mesajı gösterilir.
        echo "<div class='error'>Kullanıcı adı veya parola yanlış</div>";
    }
}

?>
<style>
 form {
    width: 50%; 
    margin: 0 auto; 
    text-align: center; 
  }

  input {
    display: block; 
    width: 70%; 
    margin: 20px auto; 
    padding: 10px; 
    border: none; 
    border-radius: 5px; 
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  input[type="submit"] {
    background-color: #4CAF50; 
    color: #fff; 
    font-size: 16px; 
    cursor: pointer;
  }

  .error {
    margin: 16px 0;
  padding: 16px;
  background-color: #f44336;
  color: white;
  border-radius: 4px;
  }
</style>
<form method="post" action="login.php" class="login-form">
<label for="email">Email:</label><br>
    <input type="text" name="email" class="form-input" placeholder="E-posta">
    <label for="password">Password:</label><br>
    <input type="password" name="password" class="form-input" placeholder="Parola">
    <input type="submit" name="submit" value="Giriş Yap">
</form>
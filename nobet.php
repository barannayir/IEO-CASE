<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET parametresi olarak gelen nöbet_id değerini alıyoruz
    if (isset($_GET['nobet_id'])) {
        $nobet_id = intval($_GET['nobet_id']);
        } 
    else {
        $nobet_id = 0;
        }

    // Veritabanı bağlantısı açılır
    $link = mysqli_connect("localhost", "root", "baran123", "IEODB");

    // Nöbet bilgisi çekilir
    $query = "SELECT * FROM nobet WHERE nobet_id=$nobet_id";
    $result = mysqli_query($link, $query);
    // Eğer bir sonuç döndürülürse, sonuç döndürülür
    if (mysqli_num_rows($result) > 0) {
        $nobet = mysqli_fetch_assoc($result);
        print_r(json_encode($nobet));
        return json_encode($nobet);
    } else {
        // Eğer bir sonuç döndürülmezse, boş bir JSON döndürülür
        return json_encode([]);
    }
}

?>
# IEO-CASE

Bu proje, index.php sayfasıyla başlar. Eğer kullanıcı oturum açmamışsa, login.php sayfasına yönlendirilir. Bu sayfa ilk kez ziyaret ediliyorsa, IEODB veritabanı oluşturulur ve içine User ve Nobet tabloları oluşturulur. Bu tablolara dummy veri girişi yapılır. Kullanıcı login.php üzerinden oturum açtığında, index.php sayfasına yönlendirilir. Bu sayfada, Nöbet ID kısmına görüntülemek istediğimiz nöbetin ID'sini gireriz (id üzerinden sorguyu tercih ettim ancak farklı şekilde de düzenlenebilir) ve nobet.php üzerinden RESTful yöntemiyle JSON verisi döndürürüz. Dönen veri, decode edilerek modal aracılığıyla ekrana yazdırılır. 
Nobet.html sayfası ES6 promise yapısı için örnek bir kod içermektedir. AJAX kullanarak nobet.php'den çektiği veriyi ekrana yazdırmaktadır.
SQL sorgusu MySQL uyumlu olarak yazılmıştır. ieodbSQL isimli bir database oluşturarak içinde case'de bulunan diagramdaki tabloları yaratır. Sorgunun son kısmında örnek queryler bulunmaktadır.

Proje localhost altında IEO-CASE klasörü içinde çalışacak şekilde düzenlenmiştir.

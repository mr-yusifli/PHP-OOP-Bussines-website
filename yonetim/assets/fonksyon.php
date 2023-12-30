<?php
// DB Connect
$servername = "localhost";                                  // Sunucu adı
$username = "root";                               // Veritabanı kullanıcı adı
$password = "";                                      // Veritabanı şifresi
$dbname = "kurumsal";                              // Veritabanı adı

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection to database successful!";
} catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}

/////////////////////////////////////////////////
// Yonetim 

class yonetim{


	
}
?>

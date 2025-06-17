<?php
session_start();
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 100;
}

// $allowedlist = "idn.id";

$remoteAddr = $_SERVER["HTTP_X_FORWARDED_HOST"] ?? '';
$hostlocal = $_SERVER["HTTP_HOST"];

// if($remoteAddr !== $allowedlist){
//    http_response_code(403);
//    include "forebidden.html";
//    exit();
// }

?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Saldo Sultan Shop</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color:rgb(28, 28, 28);
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    h2, h3 {
      color: black;
    }

    .saldo-box {
      background: #f9f9f9;
      border: 1px dashed #aaa;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 1.2em;
      color: black;
      text-align: right;

    }

    .product {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      background: #fafafa;
      text-align: center;
    }

    .product p {
      margin: 5px 0;
    }

    button {
      background-color:rgb(0, 89, 255);
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      font-size: 1em;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color:rgb(0, 135, 254);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🛒 Toko Benderaku</h2>

    <div class="saldo-box">
      💰 Saldo Kamu: <strong>Rp<?= number_format($_SESSION['saldo'], 0, ',', '.') ?></strong>
    </div>

    <div class="product">
      <h3>Premium Product</h3>
      <img src="https://static.wikia.nocookie.net/r2dremake/images/b/b9/CTF.png" alt="flag" height="200px">
      <p>Harga: <strong>Rp10.000.000.000</strong></p>
      <form action="" method="POST">
        <input type="hidden" name="saldo" value="<?= $_SESSION['saldo'] ?>">
        <button type="submit">Beli Flag</button>

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $harga = 100000000;
            $uang = $_POST['saldo'];

            if($uang >= $harga){
                echo "<p style='color:red; padding-top:3px; font-weight:bold;'>" . file_get_contents('flag.txt')."</p>";
            }
            else{
               echo "<script>alert('Uang mu ga cukup bosss!')</script>";
            }
        }
        ?>
      </form>
    </div>
  </div>
</body>
</html>

<?php
$conn = new SQLite3('/var/www/html/db.sqlite');

if (!$conn) {
    die("Connection failed");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->fetchArray()) {
        $flag = htmlspecialchars(file_get_contents("./flag.txt"));
        echo <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data PII</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 2rem;
      display: flex;
      justify-content: center;
    }
    .table-container {
      width: 100%;
      max-width: 900px;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow-x: auto;
      padding: 1rem;
    }
    h1 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 1rem;
    }
    th, td {
      padding: 0.75rem 1rem;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }
    th {
      background-color: #1260CC;
      color: #ffffff;
      position: sticky;
      top: 0;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    @media (max-width: 600px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      th {
        position: relative;
        top: auto;
      }
      td {
        padding-left: 50%;
        position: relative;
      }
      td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 1rem;
        font-weight: bold;
        color: #555;
      }
    }
  </style>
</head>
<body>
  <div class="table-container">
    <h1>Daftar Data PII</h1>
    <table>
      <thead>
        <tr>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>No. Telepon</th>
          <th>NIK</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
<tr>
          <td data-label="Nama Lengkap">Naruto Uzumaki</td>
          <td data-label="Email">naruto@konoha.go</td>
          <td data-label="No. Telepon">081234567890</td>
          <td data-label="NIK">1234567890123456</td>
          <td data-label="Alamat">Konoha, Rumah Hokage</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Sasuke Uchiha</td>
          <td data-label="Email">sasuke@uchiha.org</td>
          <td data-label="No. Telepon">082345678901</td>
          <td data-label="NIK">9876543210987654</td>
          <td data-label="Alamat">Konoha, Distrik Uchiha</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Sakura Haruno</td>
          <td data-label="Email">sakura@medic.konoha</td>
          <td data-label="No. Telepon">083456789012</td>
          <td data-label="NIK">1122334455667788</td>
          <td data-label="Alamat">Konoha, Jalan Sakura</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Kakashi Hatake</td>
          <td data-label="Email">kakashi@konoha.go</td>
          <td data-label="No. Telepon">081111111111</td>
          <td data-label="NIK">1001001001001001</td>
          <td data-label="Alamat">Konoha, Jalan Ninja 7</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Hinata Hyuga</td>
          <td data-label="Email">hinata@hyuga.net</td>
          <td data-label="No. Telepon">082222222222</td>
          <td data-label="NIK">2002002002002002</td>
          <td data-label="Alamat">Konoha, Distrik Hyuga</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Shikamaru Nara</td>
          <td data-label="Email">shikamaru@nara.org</td>
          <td data-label="No. Telepon">083333333333</td>
          <td data-label="NIK">3003003003003003</td>
          <td data-label="Alamat">Konoha, Jalan Strategi</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Ino Yamanaka</td>
          <td data-label="Email">ino@yamanaka.co</td>
          <td data-label="No. Telepon">084444444444</td>
          <td data-label="NIK">4004004004004004</td>
          <td data-label="Alamat">Konoha, Toko Bunga Yamanaka</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Choji Akimichi</td>
          <td data-label="Email">choji@akimichi.food</td>
          <td data-label="No. Telepon">085555555555</td>
          <td data-label="NIK">5005005005005005</td>
          <td data-label="Alamat">Konoha, Jalan Kuliner</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Rock Lee</td>
          <td data-label="Email">lee@taijutsu.konoha</td>
          <td data-label="No. Telepon">086666666666</td>
          <td data-label="NIK">6006006006006006</td>
          <td data-label="Alamat">Konoha, Gym Gai Sensei</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Tenten</td>
          <td data-label="Email">tenten@weapon.konoha</td>
          <td data-label="No. Telepon">087777777777</td>
          <td data-label="NIK">7007007007007007</td>
          <td data-label="Alamat">Konoha, Toko Senjata</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Neji Hyuga</td>
          <td data-label="Email">neji@hyuga.org</td>
          <td data-label="No. Telepon">088888888888</td>
          <td data-label="NIK">8008008008008008</td>
          <td data-label="Alamat">Konoha, Markas Hyuga</td>
        </tr>
        <tr>
          <td data-label="Nama Lengkap">Might Guy</td>
          <td data-label="Email">guy@powerofyouth.konoha</td>
          <td data-label="No. Telepon">089999999999</td>
          <td data-label="NIK">9009009009009009</td>
          <td data-label="Alamat">Konoha, Jalan Semangat</td>
        </tr>
        <!--{$flag}-->
        <tr>
          <td data-label="Nama Lengkap">Tsunade Senju</td>
          <td data-label="Email">tsunade@hokage.konoha</td>
          <td data-label="No. Telepon">080808080808</td>
          <td data-label="NIK">1010101010101010</td>
          <td data-label="Alamat">Konoha, Kantor Hokage</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
HTML;
    } else {
        echo "<p>Login gagal.</p>";
    }
}
?>


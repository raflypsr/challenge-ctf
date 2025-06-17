<?php
$fileContent = '';

if (isset($_GET['file'])) {
    $file = $_GET['file']; // ⬅️ TIDAK pakai proteksi, biar vuln

    $path = "pages/" . $file;

    if (file_exists($path)) {
        // Baca isi file langsung tanpa escape
        $fileContent = file_get_contents($path);
    } else {
        $fileContent = "File not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Red Mist - Company Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header with Image -->
    <div class="header">
        <img src="img.png" alt="Company Banner">
    </div>

    <!-- Navbar dengan query parameter -->
    <nav class="navbar">
        <a href="?file=about.php">About</a>
        <a href="?file=contact.php">Contact</a>
    </nav>

    <!-- Tempat file dimuat -->
    <div class="content">
        <?php
        echo $fileContent;
        ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Red Mist Technologies - Leading the Charge in Innovation & Security</p>
    </div>

</body>

</html>


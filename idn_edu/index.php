<?php
$page = $_GET['page'] ?? 'home';
$path = "pages/" . $page . ".php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IDN Networkers Site</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">ID-Networkers</div>
            <ul class="nav-links">
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=about">About</a></li>
            </ul>
        </nav>
    </header>

    <main class="content">
        <?php
        if (file_exists($path)) {
            include($path);
        } else {
            include($page); // LFI vulnerability here (intentional)
        }
        ?>
    </main>

    <footer>
        <p>© 2025 ID-Networkers Site - For Education Indonesia</p>
    </footer>
</body>
</html>


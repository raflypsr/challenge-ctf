<?php
$flag = file_get_contents("flag.txt");
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$is_hackme = ($user_agent === "hackme");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Support Force</title>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #1e1e2f;
      color: #f0f0f0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #2e2e3e;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      max-width: 600px;
      text-align: center;
    }

    h1 {
      margin-bottom: 1rem;
      color: #61dafb;
    }

    .result {
      font-size: 1.2rem;
      margin-top: 1rem;
      padding: 1rem;
      background-color: #444;
      border-radius: 5px;
      word-break: break-all;
    }

    .hint {
      margin-top: 2rem;
      font-size: 0.9rem;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Access Filtering</h1>

    <div class="result">
      <?php
      if ($is_hackme) {
          echo htmlspecialchars($flag);
      } else {
          echo "Your browser is not supported.";
      }
      ?>
    </div>

    <div class="hint">
      Hint: Check your browser headers. Something isn't quite right...
    </div>
  </div>
</body>
</html>


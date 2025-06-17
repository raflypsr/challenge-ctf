<?php
$user_id = $_GET['id'] ?? null;
$userData = null;
$error = null;

if ($user_id !== null) {
    if (!preg_match('/^\d+$/', $user_id)) {
        http_response_code(400);
        $error = "Invalid user ID.";
    } else {
        $filepath = "data/$user_id.json";
        if (file_exists($filepath)) {
            $userData = json_decode(file_get_contents($filepath), true);
        } else {
            $error = "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Info</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background-color: #f7fdf9;
      color: #2f5f3a;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      background: #ffffff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 128, 0, 0.05);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    h1 {
      color: #3d9140;
      margin-bottom: 20px;
    }

    pre {
      text-align: left;
      background: #f0fff3;
      padding: 15px;
      border-left: 4px solid #75c684;
      border-radius: 8px;
      overflow-x: auto;
    }

    .error {
      color: #a94442;
      background: #fff0f0;
      padding: 15px;
      border: 1px solid #e0b4b4;
      border-radius: 8px;
      margin-top: 20px;
    }

    .search-box {
      margin-bottom: 25px;
    }

    input[type="text"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      width: 70%;
      font-size: 14px;
    }

    button {
      padding: 10px 15px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-left: 8px;
      font-weight: bold;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>Search User Information</h1>

    <form method="GET" class="search-box">
      <input type="text" name="id" placeholder="Enter user ID" value="<?= htmlspecialchars($user_id ?? '') ?>">
      <button type="submit">Search</button>
    </form>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($userData): ?>
      <pre><?= htmlspecialchars(json_encode($userData, JSON_PRETTY_PRINT)) ?></pre>
    <?php elseif ($user_id !== null): ?>
      <div class="error">No data available.</div>
    <?php endif; ?>
  </div>
</body>
</html>


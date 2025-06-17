<?php
$flag = file_get_contents("static/flag.txt");

$cookie = $_COOKIE['user'] ?? '';
$data = json_decode($cookie, true);

if (!$data || !isset($data['role'])) {
    $data = ["role" => "guest"];
    setcookie("user", json_encode($data), time() + 3600);
}

$role = $data['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Access Terminal</title>
  <style>
    body {
      background: #0f0f0f;
      color: #00ff00;
      font-family: 'Courier New', Courier, monospace;
      padding: 2rem;
    }

    .terminal {
      max-width: 800px;
      margin: auto;
      background: #111;
      padding: 2rem;
      border: 2px solid #0f0;
      border-radius: 8px;
    }

    .prompt {
      margin-bottom: 1rem;
    }

    .output {
      background: #000;
      padding: 1rem;
      margin-top: 1rem;
      border: 1px solid #0f0;
      white-space: pre-wrap;
      word-break: break-word;
    }

    .comment {
      color: #888;
    }

    .hint {
      margin-top: 2rem;
      font-size: 0.9rem;
      color: #ccc;
    }
  </style>
</head>
<body>
  <div class="terminal">
    <div class="prompt">user@ctf-web:~$ whoami</div>
    <div class="output"><?= htmlspecialchars($role) ?></div>

    <?php if ($role === "admin"): ?>
      <div class="prompt">user@ctf-web:~$ cat /flag</div>
      <div class="output"><?= htmlspecialchars($flag) ?></div>
    <?php else: ?>
      <div class="prompt">user@ctf-web:~$ cat /flag</div>
      <div class="output">permission denied: you're not admin</div>
    <?php endif; ?>

    <div class="hint"># Hint: Inspect your cookies. Something's not what it seems 🍪</div>
  </div>
</body>
</html>


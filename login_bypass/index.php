<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: sans-serif;
      background: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 1rem;
      width: 100%;
      max-width: 400px;
    }

    h1 {
      text-align: center;
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }

    form {
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    input {
      display: block;
      margin: 1rem 0;
      padding: .75rem;
      width: 100%;
      border: 1px solid black;
      font-size: 1rem;
    }

    .button {
      background-color: #1260CC;
      border: 0;
      padding: 0.75rem;
      color: white;
      font-size: 1rem;
      width: 100%;
      cursor: pointer;
      border-radius: 5px;
    }

    .button:hover {
      background-color: #0f4fa2;
    }

    form h2 {
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }

    @media (max-width: 600px) {
      .container {
        padding: 1rem;
        width: 100%;
      }

      form {
        padding: 1.5rem;
      }

      input {
        font-size: 1rem;
      }

      .button {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Selamat Datang di Database Pengelolaan Data Konoha</h1>
    <form method="post" action="flag.php">
      <h2>Login</h2>
      <input type="text" name="username" placeholder="Username" />
      <input type="password" name="password" placeholder="Password" />
      <input type="submit" value="Login" class="button"/>
    </form>
  </div>
</body>
</html>


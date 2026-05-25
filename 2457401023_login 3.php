<?php
/**
 * NIM   : 2457401023
 * Nama  : Muhammad hari fazrian
 * Kelas : MI24
 */

$nim      = "2457401023";
$password = substr($nim, -4); // 4 digit terakhir = 1016

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username_input  = $_POST["username"] ?? "";
    $password_input  = $_POST["password"] ?? "";

    if ($username_input === $nim && $password_input === $password) {
        $pesan = '<p style="color: green;">Login Berhasil</p>';
    } else {
        $pesan = '<p style="color: red;">Username/Password tidak sesuai</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; }
        .container {
            width: 320px;
            margin: 80px auto;
            background: #fff;
            padding: 24px 28px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        h2 { margin-top: 0; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 6px 8px;
            margin-bottom: 14px;
            box-sizing: border-box;
            border: 1px solid #aaa;
            border-radius: 3px;
            font-size: 14px;
        }
        input[type="submit"] {
            background: #0000ff;
            color: #fff;
            border: none;
            padding: 7px 18px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 14px;
        }
        input[type="submit"]:hover { background: #0000cc; }
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="username"
               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

        <label>Password</label>
        <input type="password" name="password" placeholder="password">

        <input type="submit" value="Login">
    </form>
    <?= $pesan ?>
</div>
</body>
</html>

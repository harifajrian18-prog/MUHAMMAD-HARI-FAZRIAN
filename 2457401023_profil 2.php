<?php
/**
 * NIM   : 2457401023
 * Nama  : muhammad hari fazrian
 * Kelas : MI24
 */

$nama_mhs = "Muhammad hari fazrian";
$nim_mhs  = "2457401023"
$submitted = false;
$data      = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submitted = true;
    $data = [
        "NIM"              => $_POST["nim"]    ?? "",
        "Nama"             => $_POST["nama"]   ?? "",
        "Kelas"            => $_POST["kelas"]  ?? "",
        "Email"            => $_POST["email"]  ?? "",
        "Nomor Handphone"  => $_POST["hp"]     ?? "",
    ];
}

function val($key) {
    return htmlspecialchars($_POST[$key] ?? "");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Profil</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; }
        .container {
            width: 400px;
            margin: 60px auto;
            background: #fff;
            padding: 24px 28px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        label {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
            text-decoration: underline;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 6px 8px;
            margin-bottom: 14px;
            box-sizing: border-box;
            border: 1px solid #aaa;
            border-radius: 3px;
            font-size: 14px;
        }
        input[type="submit"] {
            background: #2e7d1f;
            color: #fff;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 14px;
        }
        input[type="submit"]:hover { background: #245e18; }

        /* Tabel hasil */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            font-size: 14px;
        }
        table td {
            border: 1px solid #bbb;
            padding: 7px 10px;
        }
        table td:first-child {
            background: #e8e8e8;
            font-weight: bold;
            width: 40%;
        }
        .footer {
            text-align: center;
            margin-top: 12px;
            font-size: 13px;
            color: #444;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="POST">
        <label>NIM</label>
        <input type="text" name="nim" value="<?= val('nim') ?>">

        <label>Nama</label>
        <input type="text" name="nama" value="<?= val('nama') ?>">

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= val('kelas') ?>">

        <label>Email</label>
        <input type="email" name="email" value="<?= val('email') ?>">

        <label>Nomor HP</label>
        <input type="text" name="hp" value="<?= val('hp') ?>">

        <input type="submit" value="Simpan">
    </form>

    <?php if ($submitted): ?>
    <table>
        <?php foreach ($data as $label => $value): ?>
        <tr>
            <td><?= htmlspecialchars($label) ?></td>
            <td><?= htmlspecialchars($value) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p class="footer">Dibuat oleh : <?= $nama_mhs ?> (<?= $nim_mhs ?>)</p>
    <?php endif; ?>
</div>
</body>
</html>

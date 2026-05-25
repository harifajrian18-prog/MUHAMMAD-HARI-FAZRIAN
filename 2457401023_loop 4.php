<?php
/**
 * NIM   : 2457401023
 * Nama  : Muhammad hari fazrian
 * Kelas : MI24
 */

$nama  = "muhammad hari fazrian";
$hasil = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teks    = $_POST["teks"]    ?? "";
    $jumlah  = (int)($_POST["jumlah"] ?? 0);

    for ($i = 1; $i <= $jumlah; $i++) {
        $hasil[] = $i . " - " . $teks . " (" . $nama . ")";
    }
}

$teks_val   = htmlspecialchars($_POST["teks"]   ?? "");
$jumlah_val = htmlspecialchars($_POST["jumlah"] ?? "1");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Perulangan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; }
        .container {
            width: 480px;
            margin: 60px auto;
            background: #fff;
            padding: 24px 28px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        h2 { margin-top: 0; font-weight: 900; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px 8px;
            margin-bottom: 16px;
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
        .hasil { margin-top: 16px; font-size: 14px; line-height: 1.8; }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Perulangan</h2>
    <form method="POST">
        <label>Teks</label>
        <input type="text" name="teks" value="<?= $teks_val ?>">

        <label>Jumlah Perulangan</label>
        <input type="number" name="jumlah" value="<?= $jumlah_val ?>" min="1">

        <input type="submit" value="Cetak">
    </form>

    <?php if (!empty($hasil)): ?>
    <div class="hasil">
        <?php foreach ($hasil as $baris): ?>
            <?= htmlspecialchars($baris) ?><br>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
</body>
</html>

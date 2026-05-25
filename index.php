<?php
/**
 * NIM   : 2457401023
 * Nama  : Muhammad hari fazrian
 * Kelas : MI24
 */

$page = $_GET["page"] ?? "beranda";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>MI24 - muhammad hari fazrian </title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f2f2f2; margin: 0; padding: 0; }

        /* ===== NAVBAR ===== */
        .navbar {
            display: flex;
            border: 1px solid #bbb;
            background: #fff;
            width: fit-content;
            margin: 40px auto 0;
        }
        .navbar a {
            display: block;
            padding: 10px 18px;
            text-decoration: none;
            color: #222;
            font-size: 14px;
            border-right: 1px solid #bbb;
        }
        .navbar a:last-child { border-right: none; }
        .navbar a:hover,
        .navbar a.active { background: #e0e0e0; font-weight: bold; }

        /* ===== KONTEN ===== */
        .content {
            width: 500px;
            margin: 0 auto 40px;
            padding: 10px 0;
        }

        /* ===== LOGIN ===== */
        .box {
            background: #fff;
            border: 1px solid #ccc;
            padding: 24px 28px;
            border-radius: 4px;
            margin-top: 16px;
        }
        .box h2 { margin-top: 0; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        label.ul { text-decoration: underline; }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 6px 8px;
            margin-bottom: 14px;
            border: 1px solid #aaa;
            border-radius: 3px;
            font-size: 14px;
        }
        .btn-blue {
            background: #0000ff; color: #fff; border: none;
            padding: 7px 18px; cursor: pointer; border-radius: 3px; font-size: 14px;
        }
        .btn-blue:hover { background: #0000cc; }
        .btn-green {
            background: #2e7d1f; color: #fff; border: none;
            padding: 8px 20px; cursor: pointer; border-radius: 3px; font-size: 14px;
        }
        .btn-green:hover { background: #245e18; }

        .msg-success { color: green; margin-top: 8px; }
        .msg-error   { color: red;   margin-top: 8px; }

        /* tabel profil */
        table { width: 100%; border-collapse: collapse; margin-top: 18px; font-size: 14px; }
        table td { border: 1px solid #bbb; padding: 7px 10px; }
        table td:first-child { background: #e8e8e8; font-weight: bold; width: 40%; }
        .footer-profil { text-align: center; margin-top: 12px; font-size: 13px; color: #444; }

        /* hasil loop */
        .hasil { margin-top: 16px; font-size: 14px; line-height: 1.8; }

        /* beranda */
        .beranda-info { padding: 16px 0; font-size: 14px; color: #555; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="?page=beranda"  class="<?= $page==='beranda'  ? 'active':'' ?>">Beranda</a>
    <a href="?page=login"    class="<?= $page==='login'    ? 'active':'' ?>">Form Login</a>
    <a href="?page=loop"     class="<?= $page==='loop'     ? 'active':'' ?>">Form Loop</a>
    <a href="?page=profil"   class="<?= $page==='profil'   ? 'active':'' ?>">Form Profil</a>
</nav>

<div class="content">

<?php if ($page === "beranda"): ?>
    <div class="beranda-info">
        <p>Selamat datang! Gunakan menu di atas untuk navigasi ke setiap form.</p>
        <p><strong>Nama  :</strong> muhammad hari fazrian</p>
        <p><strong>NIM   :</strong> 2457401023</p>
        <p><strong>Kelas :</strong> MI24</p>
    </div>

<?php elseif ($page === "login"):
    // ===== HALAMAN LOGIN =====
    $nim_login = "2457401023";
    $pass_login = substr($nim_login, -4);
    $pesan = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login_submit"])) {
        $u = $_POST["username"] ?? "";
        $p = $_POST["password"] ?? "";
        if ($u === $nim_login && $p === $pass_login) {
            $pesan = '<p class="msg-success">Login Berhasil</p>';
        } else {
            $pesan = '<p class="msg-error">Username/Password tidak sesuai</p>';
        }
    }
?>
    <div class="box">
        <h2>Login</h2>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" placeholder="username"
                   value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
            <label>Password</label>
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="login_submit" class="btn-blue" value="Login">
        </form>
        <?= $pesan ?>
    </div>

<?php elseif ($page === "loop"):
    // ===== HALAMAN LOOP =====
    $nama_loop = "muhammad hari fazrian";
    $hasil = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["loop_submit"])) {
        $teks   = $_POST["teks"]   ?? "";
        $jumlah = (int)($_POST["jumlah"] ?? 0);
        for ($i = 1; $i <= $jumlah; $i++) {
            $hasil[] = $i . " - " . $teks . " (" . $nama_loop . ")";
        }
    }
    $teks_val   = htmlspecialchars($_POST["teks"]   ?? "");
    $jumlah_val = htmlspecialchars($_POST["jumlah"] ?? "1");
?>
    <div class="box">
        <h2>Form Perulangan</h2>
        <form method="POST">
            <label>Teks</label>
            <input type="text" name="teks" value="<?= $teks_val ?>">
            <label>Jumlah Perulangan</label>
            <input type="number" name="jumlah" value="<?= $jumlah_val ?>" min="1">
            <input type="submit" name="loop_submit" class="btn-green" value="Cetak">
        </form>
        <?php if (!empty($hasil)): ?>
        <div class="hasil">
            <?php foreach ($hasil as $baris): ?>
                <?= htmlspecialchars($baris) ?><br>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

<?php elseif ($page === "profil"):
    // ===== HALAMAN PROFIL =====
    $nama_mhs = "muhammad hari fazrian";
    $nim_mhs  = "2457401023";
    $submitted = false;
    $data = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["profil_submit"])) {
        $submitted = true;
        $data = [
            "NIM"             => $_POST["nim"]   ?? "",
            "Nama"            => $_POST["nama"]  ?? "",
            "Kelas"           => $_POST["kelas"] ?? "",
            "Email"           => $_POST["email"] ?? "",
            "Nomor Handphone" => $_POST["hp"]    ?? "",
        ];
    }
?>
    <div class="box" style="padding-bottom:18px;">
        <form method="POST">
            <label class="ul">NIM</label>
            <input type="text"  name="nim"   value="<?= htmlspecialchars($_POST['nim']   ?? '') ?>">
            <label class="ul">Nama</label>
            <input type="text"  name="nama"  value="<?= htmlspecialchars($_POST['nama']  ?? '') ?>">
            <label class="ul">Kelas</label>
            <input type="text"  name="kelas" value="<?= htmlspecialchars($_POST['kelas'] ?? '') ?>">
            <label class="ul">Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <label class="ul">Nomor HP</label>
            <input type="text"  name="hp"    value="<?= htmlspecialchars($_POST['hp']    ?? '') ?>">
            <input type="submit" name="profil_submit" class="btn-green" value="Simpan">
        </form>
        <?php if ($submitted): ?>
        <table>
            <?php foreach ($data as $lbl => $val): ?>
            <tr>
                <td><?= htmlspecialchars($lbl) ?></td>
                <td><?= htmlspecialchars($val) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="footer-profil">Dibuat oleh : <?= $nama_mhs ?> (<?= $nim_mhs ?>)</p>
        <?php endif; ?>
    </div>

<?php endif; ?>

</div><!-- /content -->
</body>
</html>

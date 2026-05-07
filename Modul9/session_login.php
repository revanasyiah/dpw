<?php
// ============================================================
// SOAL 7 & 8 - SESSION LOGIN + EXCEPTION HANDLING
// session_start() WAJIB sebelum output apapun
// ============================================================
session_start();

// Data user valid (simulasi — di proyek nyata ambil dari database)
$users = [
    "admin"    => "admin123",
    "mahasiswa" => "mhs2024",
    "dosen"    => "dosen99",
];

$error = "";

// Proses Logout
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// Proses Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    try {
        $username = htmlspecialchars(trim($_POST["username"] ?? ""));
        $password = htmlspecialchars(trim($_POST["password"] ?? ""));

        // Validasi input kosong — exception
        if (empty($username)) {
            throw new InvalidArgumentException("Username tidak boleh kosong.");
        }
        if (empty($password)) {
            throw new InvalidArgumentException("Password tidak boleh kosong.");
        }

        // Cek apakah username terdaftar
        if (!array_key_exists($username, $users)) {
            throw new RuntimeException("Username '$username' tidak ditemukan.");
        }

        // Cek password
        if ($users[$username] !== $password) {
            throw new RuntimeException("Password salah untuk user '$username'.");
        }

        // Login sukses → simpan ke session
        $_SESSION["logged_in"]  = true;
        $_SESSION["username"]   = $username;
        $_SESSION["login_time"] = date("Y-m-d H:i:s");

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;

    } catch (InvalidArgumentException $e) {
        // Error validasi input
        $error = "⚠️ Validasi: " . $e->getMessage();
    } catch (RuntimeException $e) {
        // Error autentikasi
        $error = "🔒 Autentikasi: " . $e->getMessage();
    } catch (Exception $e) {
        // Error umum lainnya
        $error = "❌ Error: " . $e->getMessage();
    } finally {
        // Blok finally selalu dijalankan (log/cleanup)
        // error_log("Login attempt for: " . ($_POST["username"] ?? "unknown"));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 460px; margin: 50px auto; padding: 0 20px; }
        .box { background: #f0f4ff; border: 1px solid #c5cae9; padding: 28px; border-radius: 10px; }
        h2 { text-align: center; color: #3949ab; }
        label { font-weight: bold; display: block; margin-top: 12px; }
        input[type="text"], input[type="password"] {
            width: 100%; box-sizing: border-box; padding: 8px;
            border: 1px solid #9fa8da; border-radius: 4px; margin-top: 4px;
        }
        input[type="submit"] {
            width: 100%; padding: 10px; background: #3949ab; color: white;
            border: none; border-radius: 4px; cursor: pointer; margin-top: 18px; font-size: 15px;
        }
        /* Error merah kecil */
        .error { color: red; font-size: 0.82em; margin-top: 8px; font-weight: bold; }
        .success { background: #e8f5e9; border: 1px solid #81c784; padding: 16px; border-radius: 8px; }
        .success h3 { color: #2e7d32; margin-top: 0; }
        .logout-btn {
            display: inline-block; margin-top: 12px; padding: 8px 16px;
            background: #e53935; color: white; text-decoration: none; border-radius: 4px;
        }
        .hint { font-size: 0.78em; color: #555; margin-top: 12px; }
        pre { background: #fff; padding: 8px; border-radius: 4px; font-size: 0.8em; }
        .session-info { margin-top: 14px; font-size: 0.85em; }
    </style>
</head>
<body>
<div class="box">
    <h2>🔐 Session Login</h2>

    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true): ?>
        <!-- ======== HALAMAN SETELAH LOGIN ======== -->
        <div class="success">
            <h3>✅ Selamat Datang!</h3>
            <p>Anda login sebagai: <strong><?php echo $_SESSION["username"]; ?></strong></p>
            <p>Waktu login: <?php echo $_SESSION["login_time"]; ?></p>
            <div class="session-info">
                <strong>📋 Data Session Aktif:</strong>
                <pre><?php print_r($_SESSION); ?></pre>
            </div>
        </div>
        <a class="logout-btn" href="?logout=1">🚪 Logout</a>

    <?php else: ?>
        <!-- ======== FORM LOGIN ======== -->
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Username:</label>
            <input type="text" name="username" placeholder="masukkan username"
                   value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">

            <label>Password:</label>
            <input type="password" name="password" placeholder="masukkan password">

            <input type="submit" name="login" value="Login">
        </form>

        <p class="hint">
            Akun tersedia:<br>
            • admin / admin123<br>
            • mahasiswa / mhs2024<br>
            • dosen / dosen99
        </p>
    <?php endif; ?>
</div>

<details style="margin-top:16px;font-size:0.85em">
    <summary>📖 Penjelasan Session vs Cookie</summary>
    <pre>
Session:
- Data disimpan di SERVER (aman)
- Aktif selama browser terbuka / sampai session_destroy()
- Diakses via $_SESSION["key"]
- Cocok untuk data sensitif (login state, keranjang belanja)

Cookie:
- Data disimpan di BROWSER (bisa dimanipulasi user)
- Bisa bertahan lama sesuai expire yang diset
- Diakses via $_COOKIE["key"]
- Cocok untuk preferensi user, remember me
    </pre>
</details>
</body>
</html>
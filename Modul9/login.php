<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 60px auto; padding: 0 20px; }
        .login-box { background: #f9f9f9; border: 1px solid #ddd; padding: 30px; border-radius: 8px; }
        h2 { text-align: center; margin-bottom: 20px; }
        label { font-weight: bold; display: block; margin-top: 12px; }
        input[type="text"], input[type="password"] {
            width: 100%; box-sizing: border-box; padding: 8px; margin-top: 4px;
            border: 1px solid #ccc; border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%; padding: 10px; background: #007bff; color: white;
            border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; font-size: 16px;
        }
        input[type="submit"]:hover { background: #0056b3; }
        /* Error ditampilkan dengan font merah dan ukuran lebih kecil */
        .error { color: red; font-size: 0.80em; margin-top: 3px; display: block; }
        .success { background: #d4edda; border: 1px solid #c3e6cb; padding: 12px; border-radius: 6px; color: #155724; text-align: center; }
        .info { font-size: 0.82em; color: #666; text-align: center; margin-top: 10px; }
    </style>
</head>
<body>
    <?php
    // ============================================================
    // FUNGSI FILTER INPUT
    // ============================================================
    function bersihkan_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Inisialisasi variabel
    $name      = "";
    $email     = "";
    $nameErr   = "";
    $emailErr  = "";
    $loginOK   = false;

    // Username & password valid (simulasi — di proyek nyata pakai database)
    $valid_user = "admin";
    $valid_pass = "1234";

    // ============================================================
    // PROSES HANYA SAAT SUBMIT (POST)
    // ============================================================
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // --- Validasi Username ---
        if (empty($_POST["u"])) {
            $nameErr = "masukkan username";
        } else {
            $name = bersihkan_input($_POST["u"]);
            if (strlen($name) < 3) {
                $nameErr = "username minimal 3 karakter";
            }
        }

        // --- Validasi Password ---
        if (empty($_POST["p"])) {
            $emailErr = "masukkan password";
        } else {
            $email = bersihkan_input($_POST["p"]);
            if (strlen($email) < 4) {
                $emailErr = "password minimal 4 karakter";
            }
        }

        // --- Cek Kredensial (jika tidak ada error validasi) ---
        if ($nameErr == "" && $emailErr == "") {
            try {
                if ($name !== $valid_user) {
                    throw new Exception("Username tidak ditemukan.");
                }
                if ($email !== $valid_pass) {
                    throw new Exception("Password salah.");
                }
                // Login berhasil
                $loginOK = true;

            } catch (Exception $e) {
                // Soal 8: Exception handling pada login
                $nameErr = "Login gagal: " . $e->getMessage();
            }
        }
    }
    ?>

    <div class="login-box">
        <h2>🔐 Login</h2>

        <?php if ($loginOK): ?>
            <div class="success">
                ✅ Selamat datang, <strong><?php echo $name; ?></strong>! Login berhasil.
            </div>
        <?php else: ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Username:</label>
                <input type="text" name="u" value="<?php echo $name; ?>">
                <span class="error"><?php echo $nameErr; ?></span>

                <label>Password:</label>
                <input type="password" name="p">
                <span class="error"><?php echo $emailErr; ?></span>

                <input type="submit" value="Login">
            </form>
            <p class="info">Hint: username = <code>admin</code>, password = <code>1234</code></p>
        <?php endif; ?>
    </div>
</body>
</html>
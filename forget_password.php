<?php
    include "service/database.php";
    $message = "";

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];

        // Periksa apakah email terdaftar
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Email ditemukan, buat token unik
            $token = bin2hex(random_bytes(32));
            $stmt = $db->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
            $stmt->bind_param("ss", $token, $email);
            $stmt->execute();

            // Kirim token ke log file
            $resetLink = "http://localhost/nabila.com/reset_password.php?token=$token";

            // Simpan ke log dengan baris baru
            $logMessage = "[" . date("Y-m-d H:i:s") . "] Reset link untuk email $email: $resetLink\n";
            error_log($logMessage, 3, __DIR__ . "/logs/reset_password.log");

            $message = "Token telah dikirim ke log. Periksa file 'logs/reset_password.log'.";
        } else {
            $message = "Email tidak ditemukan.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Water Space</title>
</head>
<body>
    <?php include "penampung/header.php" ?>
    
    <main class="relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="h-full bg-cover bg-center" style="background-image: url('assets/images/bg.jpg');"></div>
        </div>
        
        <!-- Forget Password Form -->
        <div class="relative z-10 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white">Lupa Password</h2>
                    <p class="mt-2 text-gray-200">Masukkan email anda untuk reset password</p>
                    <?php if ($message) : ?>
                        <div class="mt-4 text-sm text-white bg-black/30 p-3 rounded">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <form class="space-y-6" action="forget_password.php" method="post">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan email terdaftar"
                            id="email"
                            name="email"
                            type="email"
                            required />
                    </div>

                    <div>
                        <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Kirim Tautan Reset
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="login.php" class="text-sm text-blue-400 hover:text-blue-300">
                            Kembali ke halaman login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

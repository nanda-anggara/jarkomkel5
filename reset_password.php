<?php
include "service/database.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Periksa token valid dan belum kadaluarsa
    $stmt = $db->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if (isset($_POST['reset_password'])) {
            $password = $_POST['password'];

            // Update password
            $stmt = $db->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE reset_token = ?");
            $stmt->bind_param("ss", $password, $token);
            $stmt->execute();

            echo "Password berhasil diperbarui.";
            header("Location: login.php");
        }
    } else {
        echo "Tautan reset tidak valid atau telah kadaluarsa.";
    }
} else {
    echo "Token tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Water Space</title>
</head>
<body>
    <?php include "penampung/header.php" ?>
    
    <main class="relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="h-full bg-cover bg-center" style="background-image: url('assets/images/bg.jpg');"></div>
        </div>
        
        <!-- Reset Password Form -->
        <div class="relative z-10 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white">Reset Password</h2>
                    <p class="mt-2 text-gray-200">Enter your new password</p>
                </div>

                <form class="space-y-6" action="reset_password.php?token=<?= htmlspecialchars($_GET['token']) ?>" method="post">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-200">New Password</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your new password"
                            id="password"
                            name="password"
                            type="password"
                            required />
                    </div>

                    <div>
                        <button type="submit" name="reset_password" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

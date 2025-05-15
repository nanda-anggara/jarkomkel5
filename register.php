<?php
    include "service/database.php";
    session_start();

    $reg_messege = "";

    if (isset($_SESSION['isLogin'])) {
        header("Location: dashboard.php");
    }

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cek apakah ini user pertama
        $check_users = "SELECT COUNT(*) as total FROM users";
        $result = $db->query($check_users);
        $row = $result->fetch_assoc();
        $role_id = ($row['total'] == 0) ? 1 : 2; // Role 1 untuk user pertama, Role 2 untuk user selanjutnya

        $sql = "INSERT INTO users (username, email, password, role_id) VALUES ('$username', '$email', '$password', '$role_id')";
        if($db->query($sql)) {
            $reg_messege = "Berhasil, silahkan login";
        } else {
            $reg_messege = "Gagal";
        }
    }
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Water Space</title>
</head>
<body>
    <?php include "penampung/header.php" ?>
    
    <main class="relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="h-full bg-cover bg-center" style="background-image: url('assets/images/bg.jpg');"></div>
        </div>
        
        <!-- Register Form -->
        <div class="relative z-10 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white">Create Account</h2>
                    <p class="mt-2 text-gray-200">Join the Water Space community</p>
                    <?php if ($reg_messege) : ?>
                        <div class="mt-2 text-sm <?= strpos($reg_messege, 'Berhasil') !== false ? 'text-green-400' : 'text-red-400' ?>">
                            <?php echo $reg_messege; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <form class="space-y-6" action="register.php" method="post">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-200">Username</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Choose a username"
                            id="username"
                            name="username"
                            type="text"
                            required />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your email"
                            id="email"
                            name="email"
                            type="email"
                            required />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Create a password"
                            id="password"
                            name="password"
                            type="password"
                            required />
                    </div>

                    <button
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        id="register"
                        name="register"
                        type="submit">
                        Create Account
                    </button>

                    <p class="mt-4 text-center text-sm text-gray-200">
                        Already have an account?
                        <a href="login.php" class="font-medium text-blue-400 hover:text-blue-300">
                            Sign in
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <?php include "penampung/footer.html" ?>
</body>
</html>
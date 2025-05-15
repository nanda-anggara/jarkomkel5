<?php
include "service/database.php";
session_start();

$login_messege = "";

if (isset($_SESSION['isLogin'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perbaikan query SQL untuk memastikan password juga dicocokkan dengan benar
    $sql = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['isLogin'] = true;
        $_SESSION['role_id'] = $data['role_id'];

        if($data['role_id'] == 1) {
            header("Location: admin/");
        } else {
            header("Location: dashboard.php");
        }
    } else {
        $login_messege = "Username/Email atau Password salah";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Water Space</title>
</head>

<body>
    <?php include 'penampung/header.php'; ?>
    
    <main class="relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="h-full bg-cover bg-center" style="background-image: url('assets/images/bg.jpg');"></div>
        </div>
        
        <!-- Login Form -->
        <div class="relative z-10 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full backdrop-blur-sm bg-black/20 rounded-xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white">Welcome Back</h2>
                    <p class="mt-2 text-gray-200">Sign in to your account</p>
                    <?php if ($login_messege) : ?>
                        <div class="mt-2 text-sm text-red-400">
                            <?php echo $login_messege; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <form class="space-y-6" action="login.php" method="post">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-200">Username or Email</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your username or email"
                            id="username"
                            name="username"
                            type="text"
                            required />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                        <input
                            class="mt-1 block w-full px-3 py-2 bg-black/30 border border-gray-500 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your password"
                            id="password"
                            name="password"
                            type="password"
                            required />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                class="h-4 w-4 bg-black/30 border-gray-500 rounded"
                                id="remember"
                                name="remember"
                                type="checkbox" />
                            <label for="remember" class="ml-2 block text-sm text-gray-200">Remember me</label>
                        </div>
                        <a class="text-sm font-medium text-blue-400 hover:text-blue-300" href="forget_password.php">
                            Forgot password?
                        </a>
                    </div>

                    <button
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        id="login"
                        name="login"
                        type="submit">
                        Sign In
                    </button>

                    <p class="mt-4 text-center text-sm text-gray-200">
                        Don't have an account?
                        <a href="register.php" class="font-medium text-blue-400 hover:text-blue-300">
                            Register now
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <?php include "penampung/footer.html" ?>
</body>

</html>
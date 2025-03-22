<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['username'])) {
    header("Location: layout/web-layout.php?page=dashboard");
    exit();
}

// Database connection (adjust as per your setup)
$db_host = 'localhost';
$db_user = 'root'; // Your DB username
$db_pass = '';     // Your DB password
$db_name = 'enrollment_system'; // Your DB name

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['username'] = $user['username'];
            $_SESSION['login'] = date('Y-m-d H:i:s'); // Optional: timestamp of login
            header("Location: layout/web-layout.php?page=dashboard");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Enrollment System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="statics/css/bootstrap.min.css">
    <script src="statics/js/bootstrap.bundle.js"></script>
    <style>
        body {
            background: rgb(229, 234, 255);
            background: radial-gradient(circle, rgba(229, 234, 255, 1) 0%, rgba(255, 255, 255, 1) 50%, rgba(229, 234, 255, 1) 100%);
            min-height: 100vh !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .login-container {
            max-width: 400px !important;
        }

        .btn-custom {
            background-color: #305CDE !important;
            border-color: #305CDE !important;
        }

        .btn-custom:hover {
            background-color: #284BB3 !important;
            border-color: #284BB3 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>For test</h1>
            </div>
            <div class="col-6">
                <div class="login-container w-100 p-4 bg-white rounded shadow">
                    <h2 class="text-center mb-4">Login</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-custom text-white w-100">Login</button>
                    </form>
                    <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign Up here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
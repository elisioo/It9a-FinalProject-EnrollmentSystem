<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['username'])) {
    header("Location: layout/web-layout.php?page=dashboard");
    exit();
}

// Database connection (same as your login page)
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'enrollment_system';

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
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Please fill in all fields.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if username already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $userExists = $stmt->fetchColumn();

        if ($userExists) {
            $error = "Username already taken.";
        } else {
            // Hash password and insert new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->execute([
                'username' => $username,
                'password' => $hashed_password
            ]);

            // Redirect to login page after successful signup
            header("Location: login.php"); // Adjust this to your login page filename
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="statics/css/bootstrap.min.css">
    <script src="statics/js/bootstrap.bundle.js"></script>
    <style>
    body {
        background-color: var(--base-clr) !important;
        min-height: 100vh !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .signup-container {
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
    <div class="signup-container w-100 p-4 bg-white rounded shadow">
        <h2 class="text-center mb-4">Sign Up</h2>
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
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-custom text-white w-100">Sign Up</button>
        </form>
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>

</html>
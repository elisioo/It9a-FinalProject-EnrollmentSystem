<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
$username = ucfirst($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment System</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css">
    <script src="../statics/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/app.js" defer></script>
</head>

<body>
    <header id="navbar" class="shadow-sm">
        <div class="logo-container">
            <img src="../img/logo.png" alt="logo" class="logo" />
        </div>
        <div class="vl"></div>
        <h2>Enrollment System</h2>
        <div class="profile-container">
            <i class="fa-solid fa-circle-user"></i>
            <p><?php echo $username; ?></p>
        </div>
    </header>
    <?php include '../views/sidebar.php'; ?>
    <main id="main-content">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
        $allowed_pages = ['dashboard', 'students', 'teachers', 'subjects', 'sections', 'payment', 'class_schedule', 'reports', 'accounts'];
        $page_path = __DIR__ . "/../views/{$page}.php";

        if (in_array($page, $allowed_pages) && file_exists($page_path)) {
          include $page_path;
        } else {
          echo "<h2>Page not found</h2>";
        }
        ?>
    </main>
</body>

</html>
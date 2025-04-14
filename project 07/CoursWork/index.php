<?php
session_start();

$host = 'localhost';
$db = 'cwp1_331';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

if (isset($_GET['page']) && $_GET['page'] == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь событий</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="images/logo/logo.png" alt="Логотип">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="?page=about" class="button <?php echo ($page === 'about') ? 'hide' : ''; ?>">Немного о нас</a></li>
                <li><a href="?page=events" class="button <?php echo ($page === 'events') ? 'hide' : ''; ?>">События</a></li>
                <li><a href="?page=contact" class="button <?php echo ($page === 'contact') ? 'hide' : ''; ?>">Где нас найти?</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <?php if ($_SESSION['user_id']>0): ?>
                <a href="?page=profile" class="button">Профиль</a>
                <a href="?page=logout" class="button">Выйти</a>
            <?php else: ?>
                <a href="?page=login" class="button <?php echo ($page === 'login') ? 'hide' : ''; ?>">Авторизация</a>
                <a href="?page=register" class="button <?php echo ($page === 'register') ? 'hide' : ''; ?>">Регистрация</a>
            <?php endif; ?>
        </div>
    </header>
    <div class="content">
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php
        if ($page === 'about') {
            include 'about.php';
        } elseif ($page === 'events') {
            include 'events.php';
        } elseif ($page === 'contact') {
            include 'contact.php';
        } elseif ($page === 'register') {
            include 'register.php';
        } elseif ($page === 'login') {
            include 'login.php';
        } elseif ($page === 'profile') {
            include 'profile.php';
        } elseif ($page === 'animation') {
            include 'animation.php';
        } else {
            include 'home.php';
        }
        ?>
    </div>



</body>
</html>

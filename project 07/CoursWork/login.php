<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'cwp1_331');

    if (empty($phone) || empty($password)) {
    } else {
        // Проверка данных пользователя
        $sql = "SELECT * FROM Hrapenko_331 WHERE phone='$phone' AND password='$password'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
                header("Location: animation.php");
            } else {
                echo "Ошибка: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>

<form action="login.php" method="POST">
    <h2>Вход</h2>
    <label for="login_phone">Телефон:</label>
    <input type="text" id="login_phone" name="phone" required>
    <label for="login_password">Пароль:</label>
    <input type="password" id="login_password" name="password" required>
    <button type="submit">Войти</button>
</form>

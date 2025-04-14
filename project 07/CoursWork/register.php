<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $agree = isset($_POST['agree']);

    if (empty($phone) || empty($password) || empty($confirm_password) || empty($agree)) {
        exit;
    }

    if ($password !== $confirm_password) {
        die("Пароли не совпадают");
        exit;
    }

    $conn = new mysqli('localhost', 'root', '', 'cwp1_331');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO Hrapenko_331 (phone, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $phone, $password);

    if ($stmt->execute()) {
        header("Location: animation.php");
    } else {
        if ($stmt->errno == 1062) {
            die("Этот номер телефона уже занят.");
        } else {
            die("Ошибка регистрации: " . $stmt->error);
        }
    }

    $stmt->close();
    $conn->close();
}
?>
<form action="index.php?page=register" method="POST">
    <h2>Регистрация</h2>
    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" required>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
    <label for="confirm_password">Подтвердите пароль:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <div class="consent-checkbox">
        <input type="checkbox" id="agree" name="agree" required>
        <label for="agree">Даю согласие на <a href="Согласие на обработку персональных данных.pdf">обработку персональных данных</a></label>
    </div>
    <button type="submit">Зарегистрироваться</button>
</form>

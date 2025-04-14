<form action="home">
<h1>Главная страница</h1>
<p>Добро пожаловать на сайт "Календарь событий"!</p>
</form>
<?php if ($_SESSION['user_id']>0): ?>
<form>
    <p> К сожалению это только начальная версия сайта, и информации здесь немного, но дальше больше ;_)<p>
</form>
<?php else: ?>
    <form action="register.php" method="POST">
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
<form action="login.php" method="POST">
    <h2>Вход</h2>
    <label for="login_phone">Телефон:</label>
    <input type="text" id="login_phone" name="phone" required>
    <label for="login_password">Пароль:</label>
    <input type="password" id="login_password" name="password" required>
    <button type="submit">Войти</button>
</form>
<?php endif; ?>
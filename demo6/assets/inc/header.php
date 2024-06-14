<div class="container">
    <header>
        <div class="header-logo">
            <h2>logo</h2>
        </div>
        <div class="header-link">
            <a href="">Главная</a>
            <a href="">ХУявная</a>
            <a href="">Главная</a>
        </div>
        <div class="header-btns">
            <? if (isset($_SESSION['AUTH_ID'])): ?>
                <? $id = $_SESSION['AUTH_ID'];
                $role = $database->query("SELECT * FROM `users` WHERE `id` = \"$id\"")->fetch();
                if ($role['role'] == 1):
                    ?>
                    <a href="?page=admin">АДмин</a>
                <? endif; ?>
                <a href="?page=profile">Профиль</a>
                <a href="assets/action/logout.php">Выход</a>
            <? else: ?>  
                <a href="?page=signin">Войти</a>
                <a href="?page=signup">Зарегестрироваться</a>
            <? endif; ?>
        </div>
    </header>
</div>
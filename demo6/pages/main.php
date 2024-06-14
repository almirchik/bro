<? $thems = $database->query("SELECT * FROM `thems`")->fetchAll(); ?>

<div class="container">
    <form action="assets/action/add-action.php" method="post">
        <input type="text" name="name" required>
        <select name="them_id" id="" required>
            <option selected value="">Выберите тему</option>
            <? foreach ($thems as $them): ?>
                <option value="<?= $them['id']; ?>">
                    <?= $them['name']; ?>
                </option>
            <? endforeach; ?>
        </select>
        <input type="text" name="comments">
        <button>отправить</button>
    </form>
</div>